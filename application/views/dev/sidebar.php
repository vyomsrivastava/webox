<?php
/**
 * Created by PhpStorm.
 * User: Vyom Srivastava
 * Date: 26-Aug-17
 * Time: 13:39
 */
?>
<div class="container-fluid">
    <div class="col-sm-12 col-md-12 sidebar ">
        <h4 >Menu</h4>
        <div class="hline"></div>
        <ul class="nav nav-sidebar">
            <li class="active"><a href="<?php echo site_url().'dev/dashboard';?>"><button href="#" class="btn btn-theme btn-block ">Dashboard </button></a> </li>
            <li><a href="<?php echo site_url().'dev/profile';?>"><button  class="btn btn-theme btn-block">Your Profile</button></a></li>
            <li><a href="<?php echo site_url().'dev/apps';?>"><button  class="btn btn-theme btn-block">Your Apps </button></a></li>
            <li><a href="<?php echo site_url().'dev/addApp';?>"><button  class="btn btn-theme btn-block">Add App </button></a></li>
                <li><a href="<?php foreach ($dataArray as $data){ echo site_url() . 'User/changePassword/2/'.$data['email'];}?>">
                        <button class="btn btn-theme btn-block">Change <br> Password</button>
                    </a></li>
                <!--            <li><a href="--><?php //echo site_url().'dev/apps';
                ?><!--"><button  class="btn btn-theme">Update/Delete Apps </button></li>-->
                <!--            <li><a href="#">Export</a></li>-->

        </ul>

    </div>
</div>