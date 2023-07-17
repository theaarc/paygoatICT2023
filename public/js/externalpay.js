document.getElementById('external-form').addEventListener('submit', async (event) => {
    event.preventDefault();
  
    const user_id = document.querySelector('input[name="user_id"]').value;
    const client_name = document.querySelector('input[name="client_name"]').value;
    const client_prof = document.querySelector('input[name="client_prof"]').value;
    const prodID = document.querySelector('input[name="prodID"]').value;
    const number = document.querySelector('input[name="number"]').value;

    // Make an AJAX request to fetch the product details
    fetch(`/products/${prodID}`)
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Failed to retrieve product details.');
        }
    })
    .then(product => {
        // Product details received, perform further operations
        const price = product.price;
        // Use the price for further operations
        console.log('Product Price:', price);
        const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
        makeCampayRequest(csrfToken, user_id, client_name, client_prof, number, price, prodID);
    })
    .catch(error => {
        console.error(error);
        // Handle error scenario
    });

})

async function makeCampayRequest(csrfToken, user_id,client_name,client_prof,number,price,prodID){
    const jsonData = {
        amount: price,
        currency: "XAF",
        from: "237"+number,
        description: "Test",
        external_reference: "",
        external_user: ""
    }

    const headers = {
      'Content-Type': 'application/json',
      'Authorization': 'Token 69691f9b74fc21d29de6860acb118ad564085040', // Add any other headers as needed
    };

    try {
      // Make the first POST request to Campay API to collect money
      const collectionResponse = await fetch('https://demo.campay.net/api/collect/', {
        method: 'POST',
        headers: headers,
        body: JSON.stringify(jsonData),
      });
  
      if (!collectionResponse.ok) {
        throw new Error('Failed to collect money');
      }
  
      // Check the response from Campay API to ensure successful collection
      const collectionResult = await collectionResponse.json();
      alert('Use the following ussd_code: ' + collectionResult.ussd_code)
    //   if (collectionResult.status !== 'success') {
    //     throw new Error('Money collection failed');
    //   }
  
      // Make the second GET request to Campay API to check transaction status

          let counter = 0;

          // Start the interval script
          const intervalId = setInterval(async () => {
              // Code to be executed at each interval

              const statusResponse = await fetch(`https://demo.campay.net/api/transaction/${collectionResult.reference}/`, {
                method: 'GET',
                headers: headers,
              });
          
              if (!statusResponse.ok) {
                throw new Error('Failed to check transaction status');
              }
          
              // Check the response from Campay API for transaction status
              const statusResult = await statusResponse.json();
              alert(statusResult.status);
              if (statusResult.status == 'SUCCESSFUL') {
                // throw new Error('Transaction not successful');
                clearInterval(intervalId);

                // Make the third PUT request to your server to update the user's account amount
                savetobdD(csrfToken, user_id, client_name, client_prof, number, price, prodID);
              }

              counter++;

              // Check if the desired time has elapsed (e.g., after 10 seconds)
              if (counter >= 900) {
                  clearInterval(intervalId); // Stop the interval script
                  console.log('Interval stopped');
              }
          }, 10000); 
    } catch (error) {
      console.error('Error:', error.message);
    }
}

  async function savetobdD(csrfToken, user_id, client_name, client_prof, number, price, prodID){

    const updateResponse = await fetch(`/users/${user_id}/pay`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
      },
      body: JSON.stringify({amount:price, number:number, client_name:client_name, client_prof:client_prof, prodID:prodID}),
    });
            
    if (!updateResponse.ok) {
      throw new Error('Failed to update account amount');
    }
    else{
      alert('Payement effectuer avec success');
    }     

}