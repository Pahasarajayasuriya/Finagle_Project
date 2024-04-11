const one = document.querySelector(".one");
const two = document.querySelector(".two");
const three = document.querySelector(".three");
const four = document.querySelector(".four");


switch(orderStatus) {
    case 'order placed':
        one.classList.add("active");
        break;
    case 'order preparing':
        one.classList.add("active");
        two.classList.add("active");
        break;
    case 'order dispatch':
        one.classList.add("active");
        two.classList.add("active");
        three.classList.add("active");
        break;
    case 'order delivered':
        one.classList.add("active");
        two.classList.add("active");
        three.classList.add("active");
        four.classList.add("active");
        break;
}