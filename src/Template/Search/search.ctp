<?php

use App\Utility\Github;

?>

<?php foreach($results['items'] as $searchResult) { ?>

    <div class="row">
        <div>
            <center><image width="150px" src="<?= $searchResult['avatar_url'] ?>" /></center>
            <center><h4><?= $searchResult['login'] ?></h4></center>
        </div>
        <center><div id="<?= $searchResult['login'] ?>-followers" class="row">
            <?php

                $followers = Github::GetFollowers($searchResult['login']);
                $followers = json_decode($followers, true);

             ?>

            <?php $x = 0; ?>
            <?php foreach($followers as $follower) { ?>

            <?php print_r($follower); ?>
            <img src="<?= $follower['avatar_url'] ?>" width="50px" />
            <?php $x = $x + 1; ?>
            <?php if($x == 15) { $x = 0; echo "<br/>"; } ?>
            <?php } ?>

        </div></center>
        <br/>
        <form id="<?= $searchResult['login'] ?>-form">
            <input type="hidden" name="<?= $searchResult['login'] ?>-page" id="<?= $searchResult['login'] ?>-page" value="2" />
            <input type="hidden" name="login" id="login" value="<?= $searchResult['login'] ?>" />
            <center><input type="submit" name="<?= $searchResult['login'] ?>-more" id="<?= $searchResult['login'] ?>-more" value="More Followers" /></center>
        </form>
        <script>
            $("#<?= $searchResult['login'] ?>-more").click(function(){
                var data = $("#<?= $searchResult['login'] ?>-form").serialize();
                $.ajax({
                    url: "/followers",
                    type: "POST",
                    data: data,
                    success: function(result) {
                        $("#<?= $searchResult['login'] ?>-page").val( function(i, oldval) {
                            return ++oldval;
                        });
                        $("#<?= $searchResult['login'] ?>-followers").append(result);
                    }
                });

                return false;
            });
        </script>
    </div>

<?php } ?>