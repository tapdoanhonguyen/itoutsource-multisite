const checkboxes = document.querySelectorAll('input[type="checkbox"]');
	//.inbox 
  let lastChecked;
  
    function handleCheck(e) {
  
      let inBetween = false;
  
  if (e.shiftKey && this.checked) {
      checkboxes.forEach(checkbox => {
      console.log(checkbox);
      if (checkbox === this || checkbox === lastChecked) {
        inBetween = !inBetween;
        console.log('STarting to check them inbetween!');
      }

      if (inBetween) {
        checkbox.checked = true;
      }
    });
  }

  lastChecked = this;
}

checkboxes.forEach(checkbox => checkbox.addEventListener('click', handleCheck));
