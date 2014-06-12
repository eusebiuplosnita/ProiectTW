<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->css("homecss");
    echo $this->Html->script("jquery");
    echo $this->Html->script("Homejss");
    echo $this->Js->writeBuffer(array('cache'=>TRUE));
    ?>
    <script src="<?php echo SITE_URL; ?>js/jquery.js"></script>
    <script src="<?php echo SITE_URL; ?>js/Homejss.js"></script>

</head>
<body style="background-image:url('<?php echo SITE_URL ?>img/background.jpg')">

<div class="cover">
    <?php echo $this->Html->image("sky.jpg", array()); ?>
</div>
<h1 id="paradise">Paradise Hotels</h1>
<button id="SignIn" > <?php echo $this->Html->link("Sign In", array("controller" => "Users","action"=> "index","id"=>"SignIn")); ?> </button>
<button id="JoinNow" > <?php echo $this->Html->link("Sign Up", array("controller" => "Users","action"=> "signup","id"=>"JoinNow")); ?></button>

<div class="buttons">
    <button id="Home" value="Home"> <?php echo $this->Html->link("Home", array("controller" => "index","action"=> "index"), array( "id" => "Home", "onclick"=>"" )); ?> </button>
    <button id="Find" value="Find"> <?php echo $this->Html->link("Find And Reserve", array("controller" => "FindAndReserve","action"=> "index"), array( "id" => "Find", "onclick"=>"" )); ?> </button>
    <button id="aboutUs" value="aboutUs" > About Us </button>
    <button id="Contact" value="Contact"> Contact </button>
</div>
<marquee id="avion" direction="right"><?php echo $this->Html->image("avion.png", array()); ?></marquee>
<br><br>

<div id="divcontact">
    <?php echo $this->Html->image("contactus.jpg", array("id" => "contactus", "alt" =>'Contact Us')); ?>
    <img id="img1" <?php echo $this->Html->image("haha.jpg", array("id" => "contactus", "alt" =>'Contact Us'));?> <br><br>
    <h4 id="titlecontact">Service information</h4> <br>
    <p id="textcontact">
        Email: serv.hp@hotmail.com
        <br>
        Email: service.hp@yahoo.ro
        <br>
        Email: serv.hotp@gmail.com
        <br>
        <strong> Phone: +1 702-731-7110</strong><br>
        <strong> Phone: +1 702-731-7111</strong><br>
        <strong> Phone: +1 702-731-7112</strong>
    </p> <br><br><br><br><br>
</div>
<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch("content"); ?>
<div id="about">
    <h2 style="color: #294758;text-align:center;">
        Paradise Hotels
    </h2>
    <h3 style="color: #1585ff;">
        Focusing on Exceptional Service, Superior Accommodations, and Great Value
        Rosen Inn at Pointe Orlando is located in the heart of International Drive and is just seconds from the Orange County Convention Center. Rosen Inn at Pointe Orlando gives families looking to explore theme parks and professionals here for business a comfortable hotel to enjoy after a long day. Because of its prime positioning across the street from Pointe Orlando, Rosen Inn has an abundance of eateries, bars, and other entertainment options that are easily accessible.
        In 2010, Rosen Inn at Pointe Orlando went through a massive renovation which set the new standard for the Rosen Inn hotel family. Rosen Inn is a tier of hotels that create an advantage by combining outstanding customer service, pleasant facilities, and top-notch locations at modest rates. Over the years, Rosen Inn at Pointe Orlando has been presented with several awards that solidify our customer’s satisfaction.
        Some of the amenities you will find at a Rosen Inn hotel are:
    </h3>
    <ul style="color: #1585ff">
        <li> HDTV</li>
        <li> Electronic safe for valuable belongings</li>
        <li> Simmons Beautyrest® Mattresses</li>
        <li> Premier movie channels</li>
        <li> Buffet style dining</li>
        <li> 24 hour security team</li>
        <li> Restaurants on property</li>
        <li> Deli and market</li>
        <li> Free wireless internet</li>
        <li> Satisfaction Guarantee</li>
    </ul>
    <h3 style="color: #1585ff;">
        &nbsp;&nbsp;&nbsp; The Rosen Inn at Pointe Orlando wants every guest to feel at home. We include a microwave, coffee maker, refrigerator, and more amenities in every room to add to the already overflowing convenience. In addition, the soft bedding and plush pillows we provide will have you and your family sound asleep in no time.
        &nbsp;&nbsp;&nbsp; Just a short walk away is Pointe Orlando, which provides endless entertainment for families. Places like BB Kings Blues Club, IMAX theatre, and Orlando Improv Comedy Club ensures your family will never have a dull moment. There are also dozens of dining options ranging from 5 star cuisines to old-fashioned burger joints.
        &nbsp;&nbsp;&nbsp; As you can see, seclecting Rosen Inn at Pointe Orlando as your Orlando vacation hotel is an easy choice. Between the location and amenities, Rosen Inn at Pointe Orlando has become the hotel families and business travelers come back to, time and time again. If you’re looking for an Orlando hotel for your next vacation or business trip, look no further. Click here to get a birds eye view of our property.
    </h3>
</div>

<!-- script pentru butonul aboutUs -->
<script>

    $(document).ready(function()
    {
        $("#aboutUs").click(function()
        {
            $("#about").slideToggle("slow");
            $('#slider').slideUp("fast");
        });
    });

</script>

<!-- script pentru butonul Contact -->

<script>

    $(document).ready(function()
    {
        $("#Contact").click(function()
        {
            $("#divcontact").slideToggle("slow");
            $('#slider').slideUp("fast");
        });
    });
</script>

</body>
</html>
