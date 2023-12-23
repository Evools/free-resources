const hsAccordion = document.querySelector('.hs-accordion-toggle');
const usersAccordionChild = document.querySelector('#users-accordion-child');
hsAccordion.addEventListener('click', () => {
  hsAccordion.classList.toggle('active');
  usersAccordionChild.classList.toggle('hidden')
})