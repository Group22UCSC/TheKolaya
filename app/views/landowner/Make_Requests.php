<?php include 'top-container.php'; ?>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/makeRequests.css">
<div class=" text">Make Requests</div>
<div class="middleContainer">
    <div class="gridContainer">
        <!-- requestType -->
        <div class="box requestType">Requests Type</div>

        <!-- requestType - select -->
        <div class="box requestTypeDropDown">
            <form class="requests" action="">
                <select name="" id="">
                    <option value="1">Advance</option>
                    <option value="2">Fertilizer</option>
                </select>
            </form>
        </div>


        <!-- requestsAmmount -->
        <div class="box requestsAmmount"> <label for="name">box requestsAmmount</label>
        </div>

        <!-- requestsAmmount - select -->
        <div class="box requestsAmmountSelect">
            <div class="form-group">
                <input id="name" type="number" />
            </div>
        </div>


        <!-- comment -->
        <div class="box comment">comment</div>

        <!-- commentbox -->
        <div class="box">
            <div class="commentbox"><textarea name="" id="" cols="30" rows="4"></textarea></div>
        </div>

    </div>
    <div class="btn">
        <button>Subbmit</button>
    </div>
</div>