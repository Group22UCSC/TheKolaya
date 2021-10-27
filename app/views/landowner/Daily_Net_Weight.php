<?php include 'top-container.php'; ?>
<!-- Top content -->
<div class="top-container">
    <p>Daily Net Weight</p>
</div>
<!--  Search bar -->

<div class="searchbar">

    <form class="search-form" action="#">
        <label for="lname">Date : </label>
        <input type="date" id="searchDate" name="searchDate" value="<?php echo date('Y-m-d'); ?>">
        <button type="submit">Search</button>
    </form>
</div>
<!--  Table COntent -->
<div class="home-content">
    <link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/Daily_Net_Weight.css">


    <div class="table-container">
        <div class="table-section">
            <table class="teapricetable">

                <tr>
                    <th class="thcls">Date</th>
                    <td class="tdcls"><?php echo date('d/m/Y'); ?></td>
                </tr>

                <tr>
                    <th class="thcls">Initial Weight</th>
                    <td class="tdcls">P23</td>
                </tr>
                <tr>
                    <th class="thcls">Water Reduce Weight</th>
                    <td class="tdcls">P23</td>
                </tr>
                <tr>
                    <th class="thcls">Container Reduced Weight</th>
                    <td class="tdcls">P23</td>
                </tr>
                <tr>
                    <th class="thcls">Mature Reduced Weight</th>
                    <td class="tdcls">P23</td>
                </tr>
                <tr>
                    <th class="thcls">Net Weight</th>
                    <td class="tdcls">P23</td>
                </tr>



            </table>
        </div>


    </div>


    <?php include 'bottom-container.php'; ?>