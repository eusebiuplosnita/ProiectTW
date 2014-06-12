<?php
    $this->Html->css("homecss", null, array("inline"=>false));
    $this->Html->script("Homejss");
    $this->Html->script("jquery");

?>

<link href="css/homecss.css" rel="stylesheet"/>

<div id="slider">
    <a href="#" class="control_next">></a>
    <a href="#" class="control_prev"><</a>
    <ul>
        <li>
            <img src="img/14.jpg"/>
        </li>

        <li>
            <img src="img/18.jpg"/>
        </li>

        <li>
            <img src="img/16.jpg"/>
        </li>
        <li>
            <img src="img/22.jpg"/>
        </li>
        <li>
            <img src="img/loc5/loc11.jpg"/>
        </li>

        <li>
            <img src="img/loc6/loc1.jpg"/>
        </li>
    </ul>
</div>


<script>
    $(document).ready(function ($) {

        $('#checkbox').change(function(){
            setInterval(function () {
                moveRight();
            });
        });

        var slideCount = $('#slider ul li').length;
        var slideWidth = $('#slider ul li').width();
        var slideHeight = $('#slider ul li').height();
        var sliderUlWidth = slideCount * slideWidth;

        $('#slider').css({ width: slideWidth, height: slideHeight });

        $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

        $('#slider ul li:last-child').prependTo('#slider ul');

        function moveLeft() {
            $('#slider ul').animate({
                left: + slideWidth
            }, function () {
                $('#slider ul li:last-child').prependTo('#slider ul');
                $('#slider ul').css('left', '');
            });
        };

        function moveRight() {
            $('#slider ul').animate({
                left: - slideWidth
            },function () {
                $('#slider ul li:first-child').appendTo('#slider ul');
                $('#slider ul').css('left', '');
            });
        };

        $('a.control_prev').click(function () {
            moveLeft();
            return false;
        });

        $('a.control_next').click(function () {
            moveRight();
            return false;
        });

    });
</script>
