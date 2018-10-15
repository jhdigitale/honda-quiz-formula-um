
<div class="menu-gray">
    <div class="logo-honda">
        <a href="/gp2018"><img src="/assets/logo_honda.png"></a>
    </div>


    <a id="nav-toggle" href="#"><span></span><!-- <tag>menu</tag> --></a>
</div>

<div class="sidebarmenu">
     <ul>
      <li>
        <a href="/gp2018">GP Quiz 2018</a>
      </li>
      <li>
        <a href="/gp2018/regulamento">Regulamento</a>
      </li>
      <!-- <li>
        <a href="/gp2018/encerrado">Resultado</a>
      </li> -->
     </ul>
</div>

<script>

  $(document).ready(function() {
      $('#nav-toggle').click(function() {
      var hidden = $(this).hasClass("active");
      //$('#nav-toggle').text(hidden ? 'Hide Menu' : 'Show Menu');
      if(!hidden){
          $(this).addClass("active");
          $('.sidebarmenu').height($(document).height());
          $('.sidebarmenu').animate({
              left: '0px'
          },500)
      } else {
          $(this).removeClass("active");
          $('.sidebarmenu').animate({
              left: '-315px'
          },500)
      }
      //$('.sidebarmenu,.image').data("hidden", !hidden);

      });
  }); 

</script>