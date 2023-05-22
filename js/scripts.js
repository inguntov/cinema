const schemeSvg = document.querySelector(".scheme-svg");
const totalPriceTag = document.querySelector(".price-total");
const totalPriceTag_1 = document.querySelector(".price-total_1");
const menuButton = document.querySelector(".m-menu");
const menu = document.querySelector(".menu");
let cost = 500;
let totalPrice = 0;
let pay = document.querySelector(".pay");


schemeSvg.addEventListener("click", (event) => {
  if (!event.target.classList.contains("booked")) {
    event.target.classList.toggle("active");
    let totalSeats = schemeSvg.querySelectorAll(".active").length;
    totalPrice = totalSeats * cost;
    totalPriceTag.textContent = totalPrice;
    totalPriceTag_1.textContent = totalPrice;
  }
});


pay.addEventListener("click", () => {
  let active = document.querySelectorAll('path.active');

  active.forEach((item) => {
    item.classList.remove("active");
    item.classList.add("booked");
  });
});


menuButton.addEventListener("click", () => {
  console.log("Кликнули по меню");
  menu.classList.toggle("is-open");
});








// modal window
!function (e) { "function" != typeof e.matches && (e.matches = e.msMatchesSelector || e.mozMatchesSelector || e.webkitMatchesSelector || function (e) { for (var t = this, o = (t.document || t.ownerDocument).querySelectorAll(e), n = 0; o[n] && o[n] !== t;)++n; return Boolean(o[n]) }), "function" != typeof e.closest && (e.closest = function (e) { for (var t = this; t && 1 === t.nodeType;) { if (t.matches(e)) return t; t = t.parentNode } return null }) }(window.Element.prototype);


document.addEventListener('DOMContentLoaded', function () {

  /* Записываем в переменные массив элементов-кнопок и подложку.
     Подложке зададим id, чтобы не влиять на другие элементы с классом overlay*/
  var modalButtons = document.querySelectorAll('.js-open-modal'),
    overlay = document.querySelector('.js-overlay-modal'),
    closeButtons = document.querySelectorAll('.js-modal-close');


  /* Перебираем массив кнопок */
  modalButtons.forEach(function (item) {

    /* Назначаем каждой кнопке обработчик клика */
    item.addEventListener('click', function (e) {

      /* Предотвращаем стандартное действие элемента. Так как кнопку разные
         люди могут сделать по-разному. Кто-то сделает ссылку, кто-то кнопку.
         Нужно подстраховаться. */
      e.preventDefault();

      /* При каждом клике на кнопку мы будем забирать содержимое атрибута data-modal
         и будем искать модальное окно с таким же атрибутом. */
      var modalId = this.getAttribute('data-modal'),
        modalElem = document.querySelector('.modal[data-modal="' + modalId + '"]');


      /* После того как нашли нужное модальное окно, добавим классы
         подложке и окну чтобы показать их. */
      modalElem.classList.add('active');
      overlay.classList.add('active');
    }); // end click

  }); // end foreach


  closeButtons.forEach(function (item) {

    item.addEventListener('click', function (e) {
      var parentModal = this.closest('.modal');

      parentModal.classList.remove('active');
      overlay.classList.remove('active');
    });

  }); // end foreach


  document.body.addEventListener('keyup', function (e) {
    var key = e.keyCode;

    if (key == 27) {

      document.querySelector('.modal.active').classList.remove('active');
      document.querySelector('.overlay').classList.remove('active');
    };
  }, false);


  overlay.addEventListener('click', function () {
    document.querySelector('.modal.active').classList.remove('active');
    this.classList.remove('active');
  });




}); // end ready
