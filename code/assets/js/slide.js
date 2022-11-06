new Splide('.splide', {
  type: 'loop',
  perPage: 3,
  focus: 'center',
  autoWidth: true,
  gap: '1rem',
  arrows: false,
  autoplay: true,
  interval: 2500,
  flickMaxPages: 3,
  updateOnMove: true,
  pagination: false,
  padding: '10%',
  throttle: 300,
  breakpoints: {
    1440: {
      perPage: 4,
      // padding: '30%'
    }
  }
}).mount();