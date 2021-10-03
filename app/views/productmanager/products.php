<?php include 'top-container.php'; ?>
<!-- Top content -->
<div class="top-container">
    <p>Product Stock Details</p>
</div>

<!--  Table COntent -->
<div class="home-content">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/productmanager/products.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
 
    
<div class="table-container right-fade">
  <div class="scroll-area">

    <table>
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Product Name</th>
          <th class="small-col align-right">Stock Amount(Kg)</th>
          <th class="small-col align-right">Enable</th>
          <th class="small-col align-right">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr onclick="loadTeaPage()">
          <td>John Smith</td>
          <td>Sales</td>
          <td class="small-col align-right">293</td>
          <td class="small-col align-right">
            <label onclick="clickedToggle(event, 'Enabled John')" class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
          </td>
          <td class="small-col align-right"><button onclick="clickedButton(event, 'John')">Action</button></td>
        </tr>
        <tr onclick="alert('You clicked Jane Doe')">
          <td><a href="#">Jane Doe</a></td>
          <td>Admin (HR)</td>
          <td class="small-col align-right">1,208</td>
          <td class="small-col align-right">
            <label onclick="clickedToggle(event, 'Enabled Jane')" class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
          </td>
          <td class="small-col align-right"><button onclick="clickedButton(event, 'Jane')">Action</button></td>
        </tr>
        <tr onclick="alert('You clicked Barak Obama')">
          <td><a href="#">Barak Obama</a></td>
          <td>Ex-President</td>
          <td class="small-col align-right">80</td>
          <td class="small-col align-right">
            <label onclick="clickedToggle(event, 'Enabled Barak')" class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
          </td>
          <td class="small-col align-right"><button onclick="clickedButton(event, 'Barak')">Action</button></td>
        </tr>
      </tbody>
    </table>
    
  </div>
</div>

<!-- <p id="debug">Debug</p> -->

<script>
  // The function that the buttons are calling on click.
  // Passes the event, and content for the alert box
  function clickedButton (ev, content) {
    ev.stopPropagation(); // Stop the bubbling
    
    // Do something
    alert(content);
  }

  function loadTeaPage(){
      loacation.replace("<?php echo URL?>Agent/updateTeaWeight");
  }
  
  // The function that the checkboxes are calling on click.
  // Passes the event, and content for the alert box
  function clickedToggle (ev, content) {
    ev.stopPropagation(); // Stop the bubbling
    
    // Do something
    if( event.target.tagName === "INPUT" ) {
      alert(content);
    }
  }
  var debugText = document.querySelector('#debug'); // To show numbers on screen

var tableContainer = document.querySelector('.table-container'); // What to add our fade classes on
var scrollArea = document.querySelector('.scroll-area'); // The area that has the scroll on it

var scroll = scrollArea.scrollLeft; // The current scroll position
var scrollAreaWidth = scrollArea.offsetWidth; // The current scroll area width
var totalScrollArea = scrollArea.scrollWidth; // The current width of the content within the scroll area

var currentScrollPos = scrollArea.scrollLeft; // The position that the scroll bar is currently

// Listen on scroll of the scroll area
scrollArea.addEventListener("scroll", adjustFades);

// Listen on resize of the window - incase it induces a scroll
window.addEventListener("resize", adjustFades);

// Check if fades are needed on page load (before any scrolling has been done)
window.onload = adjustFades();

// The function check the current positions and widths.
// Decide if fades are required on either side
// Output debug text
function adjustFades () {
  
  scroll = scrollArea.scrollLeft;
  scrollAreaWidth = scrollArea.offsetWidth;
  totalScrollArea = scrollArea.scrollWidth;
    
  debugText.innerHTML =
		'Scroll Area Width: ' + scrollAreaWidth +
		'<br/>' +
		'Scroll: ' + scroll +
		'<br/>' +
		'Total Scroll Area: ' + totalScrollArea +
		'<br>Total Scroll Area - Scroll: ' + 
		(totalScrollArea - scroll);
  
  if (scroll === 0) {
		removeFade('left');
	} else {
		addFade('left');
	}
  
	if (totalScrollArea - scroll === scrollAreaWidth) {
		removeFade('right');
	} else {
		addFade('right');
	}
}

// Utility function to add fades
function addFade(side) {
	tableContainer.classList.add(side + '-fade');
}

// Utility function to remove fades
function removeFade(side) {
	tableContainer.classList.remove(side + '-fade');
}
</script>

  <?php include 'bottom-container.php'; ?>