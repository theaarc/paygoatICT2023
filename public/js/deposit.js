document.getElementById('deposit-form').addEventListener('submit', async (event) => {
    event.preventDefault();
  
    const number = document.querySelector('input[name="from"]').value;
    const amount = document.querySelector('input[name="amount"]').value;
    const from = "237"+number;
    const idu = document.querySelector('input[name="idu"]').value;
  
    const jsonData = {
        amount: amount,
        currency: "XAF",
        from: from,
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
                const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                savetobdD(csrfToken, amount, idu, number);
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
  });


  async function savetobdD(csrfToken, amount, idu, number){

    const updateResponse = await fetch(`/users/${idu}/depot`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
      },
      body: JSON.stringify({amount:amount,number:number}),
    });
            
    if (!updateResponse.ok) {
      throw new Error('Failed to update account amount');
    }
    else{
      alert('Depot effectuer avec success');
    }     

}