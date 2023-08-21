(function () {
  const quickSearch = document.getElementById('quickSearch');
  const input = quickSearch.querySelector('.search-input');
    
  function onSubmitHandler(el) {
    el.preventDefault();
    const inputVal = input.value;

    if(inputVal !=='') {
      quickSearch.submit();
    }
  }

  quickSearch.addEventListener("submit", function(el) {
    onSubmitHandler(el);
  })

  const breakpoint = window.matchMedia( '(min-width:1024px)' );

  let downloadSwiper;

  const breakpointChecker = function() {

    if ( breakpoint.matches === true ) {
      if ( mySwiper !== undefined ) mySwiper.destroy( true, true );
      return;
    } else if ( breakpoint.matches === false ) {
      return enableSwiper();
    }
  };

  const enableSwiper = function() {
    downloadSwiper = new Swiper ('.document-swiper-container', {
      slidesPerView: '1.5',
      spaceBetween: 8,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

  };
  breakpoint.addListener(breakpointChecker);

  breakpointChecker();
})();