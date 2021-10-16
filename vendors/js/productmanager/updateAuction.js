function validation(){
  // var errArray=[];
  // errArray['name']="Melka";
  // let amount = document.getElementById('amount').value;
  // if (amount == "") {
  //   errArray['amountmissing']="Please fill the amount";
  // }
  // if(errArray.length==0){
  //   document.getElementById('amount').value=errArray['amountmissing'];
  // }
  // if(errArray.length==0){
  //   return true;
  // }
  return false;
}
// if(validation()){
  const openModalButtons = document.querySelectorAll('[data-modal-target]')
  const closeModalButtons = document.querySelectorAll('[data-close-button]')
  const overlay = document.getElementById('overlay')
  
  openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
      const modal = document.querySelector(button.dataset.modalTarget)
      openModal(modal);
      getDetails();
      loadModalName2();
    })
  })
  
  overlay.addEventListener('click', () => {
    const modals = document.querySelectorAll('.modal.active')
    modals.forEach(modal => {
      closeModal(modal)
    })
  })
  
  closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
      const modal = button.closest('.modal')
      closeModal(modal)
    })
  })
  
  function openModal(modal) {
    if (modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')
  }
  
  function closeModal(modal) {
    if (modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
  }
  
  /// loading the pid for the first form
  
  function loadPid(){
      // console.log("ada");
      var e = document.getElementById("productName");
      var val= e.options[e.selectedIndex].value;
      document.getElementById('pid').value=val;
  }
  
  /// getAll the details from the first form to the second
  function loadModalName(element){
  
      var text = element.options[element.selectedIndex].text;
      document.getElementById('modalName').value=text;
  
  }
  function loadModalName2(){
    // console.log("ada");
      var element=document.getElementById('productName');
      var text = element.options[element.selectedIndex].text;
      document.getElementById('modalName').value=text;
    
  }
  function getDetails(){
  
      // var name=document.getElementById('productName');
      // document.getElementById('modalName').value=name.options[sel.selectedIndex].text;
      
      // var sel = document.getElementById("box1");
      // var text= sel.options[sel.selectedIndex].text;
      
  
      var pid=document.getElementById('pid').value;
      document.getElementById('modalPid').value=pid;
  
  
      var amount=document.getElementById('amount').value;
      document.getElementById('modalAmount').value=amount;
  
      var price=document.getElementById('price').value;
      document.getElementById('modalPrice').value=price;


      var buyer=document.getElementById('buyer');
      var buyerID = buyer.options[buyer.selectedIndex].text;  
      document.getElementById('modalBuyer').value=buyerID;


      //update hidden feilds
      var buyer2=document.getElementById('buyer').value;
      document.getElementById('modalBid').value=buyer2;
  }
// }

  //sweet alert success
  function success(){
    swal({
        title: "Success!",
        text: "Database updated successfully!",
        icon: "success",
        button: "Done!",
    });
  } 

  