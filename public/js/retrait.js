document.getElementById('retrait-form').addEventListener('submit', async (event) => {
    event.preventDefault();
  
    const number = document.querySelector('input[name="to"]').value;
    const amount = document.querySelector('input[name="amountw"]').value;
    const to = "237"+number;
    const idu = document.querySelector('input[name="iduW"]').value;
    const solde = document.querySelector('input[name="solde"]').value;

    if(parseInt(solde) <= parseInt(amount)){
        alert("Votre solde est insuffisant");
    }else{
        const jsonData = {
            amount: amount,
            to: to,
            description: "Test",
            external_reference: ""
        }

        const headers = {
            'Content-Type': 'application/json',
            'Authorization': 'Token 69691f9b74fc21d29de6860acb118ad564085040', // Add any other headers as needed
          };

          try {
            // Make the first POST request to Campay API to collect money
            const collectionResponse = await fetch('https://demo.campay.net/api/withdraw/', {
              method: 'POST',
              headers: headers,
              body: JSON.stringify(jsonData),
            });
        
            if (!collectionResponse.ok) {
              throw new Error('Failed to Withraw money');
            }

            alert('Withdraw initiated successfully')

            const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
            savetobdW(csrfToken, amount, idu, number);

          } catch (error) {
            console.error('Error:', error.message);
          }
    }
  
});

  async function savetobdW(csrfToken, amount, idu, number){
    
    const updateResponse = await fetch(`/users/${idu}/withdraw`, {
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
      // Account amount updated successfully
      alert('Retrait effectuer avec success');
    }
  }