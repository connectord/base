<!--TITLE=Welcome!-->
<div class="connectord-page">

    <h1>Welcome page here!</h1>

    <p>Current time is <span id="clock"></span></p>

</div>

<script>
    Web.log('hello from index');

    Web.get('/status').then(function(response) {
        Web.log(response);
    })

</script>