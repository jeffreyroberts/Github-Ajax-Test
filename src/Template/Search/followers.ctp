<center><div class="row">
    <?php $x = 0; ?>
    <?php foreach($followers as $follower) { ?>

    <img src="<?= $follower['avatar_url'] ?>" width="50px" />
    <?php $x = $x + 1; ?>
    <?php if($x == 15) { $x = 0; echo "<br/>"; } ?>
    <?php } ?>
</div></center>