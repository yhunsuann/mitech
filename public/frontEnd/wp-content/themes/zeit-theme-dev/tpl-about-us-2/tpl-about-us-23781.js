function count() {
  $('.counter').each(function() {
    var $this = $(this),
        countTo = $this.attr('data-count');
    
    $({ countNum: $this.text()}).animate({
      countNum: countTo
    },
  
    {
      duration: 4000,
      easing:'linear',
      step: function() {
        $this.text(Math.floor(this.countNum));
      },
      complete: function() {
        $this.text(this.countNum);
      }
    });  
  });
}

let eleT = $('.statistic-sect').offset().top;
let eleOuterH = $('.statistic-sect').outerHeight();
let windowH = $(window).height();

$(window).on("resize scroll" , function() {
  let  wS = $(this).scrollTop();

  if (wS > (eleT+eleOuterH-windowH)){
    count();
  }
});

if ($(window).scrollTop() + windowH > eleT) {
  count();
}