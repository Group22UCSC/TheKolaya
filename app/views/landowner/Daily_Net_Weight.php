<?php include 'top-container.php'; ?>
<?php include 'js/landowner/Daily_Net_Weightjs.php"'; ?>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/Daily_Net_Weight.css">
<script type="text/javascript" src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
<?php
if (isset($_POST['Error'])) {
    echo '<script type="text/javascript">',
    'dateNotFound();',
    '</script>';
}
?>

<!-- Title -->

<div class="top-container">
    <p>Daily Net Weight</p>
</div>


<!-- grid -->
<div class="wrapperdiv">
    <div class="container">

        <div class="search-container">
            <div class="searchbar">
                <form class="search-form" action="<?php echo URL ?>Landowner/Daily_Net_Weight" method="post">
                    <label for="lname">Date : </label>
                    <input type="date" id="searchDate" name="searchDate">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>

        <div class="table-container">

            <table class="teapricetable">

                <tr>
                    <th class="thcls">Date</th>
                    <td class="tdcls"><?php echo $data[0]['date']; ?></td>
                </tr>

                <tr>
                    <th class="thcls">Initial Weight</th>
                    <td class="tdcls"><?php echo $data[0]['initial_weight_agent']; ?> Kg</td>
                </tr>
                <!-- there is no field called Container Count -->
                <!-- <tr>
          <th class="thcls">Container Count</th>
          <td class="tdcls"><?php echo $data[0]['date']; ?></td>
        </tr> -->
                <tr>
                    <th class="thcls">Container Reduced Weight</th>
                    <td class="tdcls"><?php echo $data[0]['container_precentage']; ?> Kg</td>
                </tr>
                <tr>
                    <th class="thcls">Water Reduce Weight</th>
                    <td class="tdcls"><?php echo $data[0]['water_precentage']; ?> Kg</td>
                </tr>

                <tr>
                    <th class="thcls">Mature Reduced Weight</th>
                    <td class="tdcls"><?php echo $data[0]['matured_precentage']; ?> Kg</td>
                </tr>
                <tr>
                    <th class="thcls">Net Weight</th>
                    <td class="tdcls"><?php echo $data[0]['net_weight']; ?> Kg</td>
                </tr>



            </table>

        </div>

    </div>
</div>




<?php include 'bottom-container.php'; ?>