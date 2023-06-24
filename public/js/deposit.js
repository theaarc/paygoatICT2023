document.getElementById('deposit-form').addEventListener('submit', async (event) => {
    event.preventDefault();
  
    const amount = document.querySelector('input[name="amount"]').value;
    const from = "237"+document.querySelector('input[name="from"]').value;
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
                savetobd(csrfToken, amount, idu);
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


  async function savetobd(csrfToken, amount, idu){
    const updateResponse = await fetch(`/users/${idu}/account`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
      },
      body: JSON.stringify({ amount:amount }),
    });
            
    if (!updateResponse.ok) {
      throw new Error('Failed to update account amount');
    }
            
    // Account amount updated successfully
    console.log('Account amount updated');
  }

  


//   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
//   document.getElementById('myForm').addEventListener('submit', function(event) {
//       event.preventDefault();

//       var amount = document.getElementById("amount").value;
//       var number = "237"+document.getElementById("number").value;

//       const jsonData = {
//           amount: amount,
//           currency: "XAF",
//           from: number,
//           description: "Test",
//           external_reference: "",
//           external_user: ""
//       }

//       const headers = {
//           'Content-Type': 'application/json',
//           'Authorization': 'Token 69691f9b74fc21d29de6860acb118ad564085040', // Add any other headers as needed
//       };

//       // Make the AJAX request
//       async function fetchData(amount, param, intervalset){
//           //alert(param);
//           try {
//               // Send GET request to fetch data
//               const response = await fetch('https://demo.campay.net/api/transaction/'+param+'/', {
//                   method: 'GET',
//                   headers: headers,
//               })
//               // Check if response is successful
//               if (response.ok) {
//                   const data = await response.json();

//                   alert(data.status)
//                   // Check the result and conditionally make a PUT request
//                   if (data.status == 'SUCCESSFUL') {
//                       await updateData(amount, intervalset);
//                   } else if(data1.status == 'FAILED') {
//                       console.log('Condition not met');
//                       clearInterval(intervalset)
//                   }
//               } else {
//                   console.error('Error:', response.status);
//                   clearInterval(intervalset);
//               }
//           } catch (error) {
//               console.error('Error:', error);
//           }
//       }

//       async function updateData(amount, intervalset) {
//           const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

//               // Make the fetch request to update the account amount
//               //var userId = @json(auth()->user()->id);
//               alert(userId)
//               alert(amount)

//               var newAmount = 50

//               const Jdata = {
//                   amount: amount,
//               };

//           try {
//               // Send PUT request to update data
//               const response = await fetch(`/users/${userId}/amount`, {
//                   method: 'PUT',
//                   headers: {
//                       'Content-Type': 'application/json',
//                       'X-CSRF-TOKEN': csrfToken,
//                       'X-Requested-With': 'XMLHttpRequest',
//                   },
//                   body: JSON.stringify(Jdata),
//               });

//               if (response.ok) {
//                   const data = await response.json();

//                   alert('Field value updated successfully.');
//                   document.getElementById("result").innerHTML = "YEAH, you bought !!!"
//                   console.log(data.message);
//               } else {
//                   alert("nope")
//                   console.error('Error:', response.status);
//                   clearInterval(intervalset)

//               }
//           } catch (error) {
//               console.error('Error:', error);
//           }
//       }



//       fetch('https://demo.campay.net/api/collect/', {
//           method: 'POST',
//           headers: headers,
//           body: JSON.stringify(jsonData),
//       })
//       .then(response => response.json())
//       .then(data => {
//           //alert(data); // Handle the response data
//           alert('Use the following ussd_code: ' + data.ussd_code)
                       
//           let counter = 0;

//           // Start the interval script
//           const intervalId = setInterval(() => {
//               // Code to be executed at each interval
//               fetchData(amount, data.reference, intervalId);
//               counter++;

//               // Check if the desired time has elapsed (e.g., after 10 seconds)
//               if (counter >= 900) {
//                   clearInterval(intervalId); // Stop the interval script
//                   console.log('Interval stopped');
//               }
//           }, 10000);                  
//       })
//       .catch(error => {
//           alert("Fetch one  :"+error); // Handle any errors
//       });
//   });
