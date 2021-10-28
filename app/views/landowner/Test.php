<?php include 'top-container.php'; ?>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/Test.css">

<!-- Title -->

<div class="top-container">
  <p>Daily Net Weight</p>
</div>


<!-- grid -->
<div class="wrapperdiv">
  <div class="container">

    <div class="search-container">
      <div class="searchbar">
        <form class="search-form" action="#">
          <label for="lname">Date : </label>
          <input type="date" id="searchDate" name="searchDate" value="<?php echo date('Y-m-d'); ?>">
          <button type="submit">Search</button>
        </form>
      </div>
    </div>

    <div class="table-container">

      <table class="teapricetable">

        <tr>
          <th class="thcls">Date</th>
          <td class="tdcls"><?php echo date('d/m/Y'); ?></td>
        </tr>

        <tr>
          <th class="thcls">Initial Weight</th>
          <td class="tdcls">145 kg</td>
        </tr>
        <tr>
          <th class="thcls">Container Count</th>
          <td class="tdcls">4</td>
        </tr>
        <tr>
          <th class="thcls">Container Reduced Weight</th>
          <td class="tdcls">12 kg</td>
        </tr>
        <tr>
          <th class="thcls">Water Reduce Weight</th>
          <td class="tdcls">10 kg</td>
        </tr>

        <tr>
          <th class="thcls">Mature Reduced Weight</th>
          <td class="tdcls">6 kg</td>
        </tr>
        <tr>
          <th class="thcls">Net Weight</th>
          <td class="tdcls">117 kg</td>
        </tr>



      </table>

    </div>

  </div>
</div>




<?php include 'bottom-container.php'; ?>