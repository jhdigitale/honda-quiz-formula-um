
<div class="menu-gray">
    <div class="logo-honda">
        <img src="/assets/logo_honda.png">
    </div>


    <a id="nav-toggle" href="#"><span></span><!-- <tag>menu</tag> --></a>
</div>

<div class="sidebarmenu">
     <ul>
      <li>
        <a href="/">GP QUIZ 2018</a>
      </li>
      <li>
        <a href="/regulamento">Regulamento</a>
      </li>
     </ul>
</div>

<script>

  $(document).ready(function() {
      $('#nav-toggle').click(function() {
      var hidden = $(this).hasClass("active");
      //$('#nav-toggle').text(hidden ? 'Hide Menu' : 'Show Menu');
      if(!hidden){
          $(this).addClass("active");
          $('.sidebarmenu').animate({
              left: '0px'
          },500)
      } else {
          $(this).removeClass("active");
          $('.sidebarmenu').animate({
              left: '-260px'
          },500)
      }
      //$('.sidebarmenu,.image').data("hidden", !hidden);

      });
  }); 

</script>