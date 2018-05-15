
<header class="row">
    <div class="header-title">
        <h1>Jeffrey.L.Roberts@Gmail.com's Github AJAX Example</h1>
    </div>
</header>

<div id="search-box" style="margin:150px;">
    <form name="search-form" id="search-form" action="/search">
        <div class="row" style="width: 450px;">
            <input type="text" name="search" placeholder="Search Github Users" />
        </div>
        <div class="row" style="width: 350px; margin-left: 350px;">
            <input type="submit" name="submit" id="submit" value="Submit Search" />&nbsp;&nbsp;
            <input type="submit" name="submit" id="lucky" value="I'm Feeling Lucky" />
        </div>
    </form>
</div>

<div id="div1" style="margin:150px">

</div>

<script>
    $("#submit").click(function(){
        var data = $('#search-form').serialize();
        $.ajax({
            url: "/search",
            type: "POST",
            data: data,
            success: function(result) {
                $("search-box").css('display', 'none');
                $("#div1").html(result);
            }
        });

        return false;
    });
</script>