//
// SlideShow
let itemShoes = document.querySelectorAll(".slide_show .item-shoes");
let clickNextBtn = document.querySelector(".next-btn");
let clickPrevBtn = document.querySelector(".prev-btn");
let wrapper_shoes__list = document.querySelector(".wrapper_shoes--list");
var indexSlideShow = 0;
function handleSlideShow() {
	let accurate = itemShoes[0].offsetWidth;
	if (indexSlideShow === itemShoes.length - 1) {
		indexSlideShow = 0;
		wrapper_shoes__list.style.transform = `translateX(${(accurate * -1) * indexSlideShow}px)`;
	} else {
		indexSlideShow++;
		wrapper_shoes__list.style.transform = `translateX(${(accurate * -1) * indexSlideShow}px)`;
	}
}
let loopSlideShow = setInterval(handleSlideShow, 7000);
clickNextBtn.addEventListener("click", e => {
	clearInterval(loopSlideShow);
	let accurate = itemShoes[0].offsetWidth;
	if (indexSlideShow === itemShoes.length - 1) {
		indexSlideShow = 0;
		wrapper_shoes__list.style.transform = `translateX(${(accurate * -1) * indexSlideShow}px)`;
	} else {
		indexSlideShow++;
		wrapper_shoes__list.style.transform = `translateX(${(accurate * -1) * indexSlideShow}px)`;
	}
	loopSlideShow = setInterval(handleSlideShow, 7000);

});
clickPrevBtn.addEventListener("click", e => {
	clearInterval(loopSlideShow);
	let accurate = itemShoes[0].offsetWidth;
	if (indexSlideShow === 0) {
		indexSlideShow = itemShoes.length - 1;
		wrapper_shoes__list.style.transform = `translateX(${(accurate * -1) * indexSlideShow}px)`;
	} else {
		indexSlideShow--;
		wrapper_shoes__list.style.transform = `translateX(${(accurate * -1) * indexSlideShow}px)`;
	}
	loopSlideShow = setInterval(handleSlideShow, 7000);
});
////////////////////////////////////////////////////////////////////////////////////////
let wrapper_shoes_outside = document.querySelector(".wrapper_shoes_outside");
let wrapper = document.querySelector(".wrapper");
let wrapper_shoes_outside_right = document.querySelector(".wrapper_shoes_outside-right");
let prev_btn = document.querySelector(".slide_show .prev-btn");
let next_btn = document.querySelector(".slide_show .next-btn");
///////////////////////////////////////////////////////////////////////////////////////
function handleSlideShowLeft(value) {
	wrapper_shoes_outside.style.top = `${(value + 100) * .6}px`;
	wrapper_shoes_outside.style.left = `${(value + 200) * -.6}px`;
	wrapper_shoes_outside.style.transform = ` rotate(${(value - 600) * -.1}deg)`;
	wrapper.style.marginTop = `${value * .65}px`;
	next_btn.style.marginTop = `${value * .6}px`;
	prev_btn.style.marginTop = `${value * .6}px`;
}

function handleSlideShowRight(value) {
	wrapper_shoes_outside_right.style.top = `${(value + 270) * .6}px`;
	wrapper_shoes_outside_right.style.right = `${(value + 160) * -.6}px`;
	wrapper_shoes_outside_right.style.transform = ` rotate(${(value - 100) * -.1}deg)`;
}

function handleHeaderFixed(value) {
	let header_bottom = document.querySelector(".header_bottom");
	let nav = document.querySelector('.navigation_mobile');
	if (value > 445) {
		header_bottom.classList.add('position_fixed');
		nav.classList.add('active');
	} else if (value < 455) {
		header_bottom.classList.remove('position_fixed');
		nav.classList.remove('active');

	}
}
function handleRevael() {
	let reveal = document.querySelectorAll(".reveal");
	let reveal1 = document.querySelectorAll(".reveal1");
	let reveal2 = document.querySelectorAll(".reveal2");
	let reveal3 = document.querySelectorAll(".reveal3");
	let reveal4 = document.querySelectorAll(".reveal4");
	let windownHeight = window.innerHeight;
	let collisionDistance = 100;
	reveal.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeReveal");
		} else {
			item.classList.remove("activeReveal");

		}
	});
	reveal1.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeReveal1");
		} else {
			item.classList.remove("activeReveal1");

		}
	});
	reveal2.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeReveal2");
		} else {
			item.classList.remove("activeReveal2");

		}
	});
	reveal3.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeReveal3");
		} else {
			item.classList.remove("activeReveal3");

		}
	});
	reveal4.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeReveal4");
		} else {
			item.classList.remove("activeReveal4");
		}
	});
}
function handleRevealRight() {
	let revealRight = document.querySelectorAll(".reveal_right");
	let revealRight1 = document.querySelectorAll(".reveal_right1");
	let revealRight2 = document.querySelectorAll(".reveal_right2");
	let windownHeight = window.innerHeight;
	let collisionDistance = 100;
	revealRight.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeRevealRight");
		} else {
			item.classList.remove("activeRevealRight");

		}
	});
	revealRight1.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeRevealRight1");
		} else {
			item.classList.remove("activeRevealRight1");

		}
	});
	revealRight2.forEach((item) => {
		let locationCollision = item.getBoundingClientRect().top;
		if (locationCollision < windownHeight - collisionDistance) {
			item.classList.add("activeRevealRight2");
		} else {
			item.classList.remove("activeRevealRight2");

		}
	});
}
var onceActive = true;
function handleIncreaseNumberWhenScroll(value) {
	let getDataNumbers = document.querySelectorAll('.about .increase_number .controls .item p:first-child');
	let windownHeight = window.innerHeight;
	let collisionDistance = 150;
	getDataNumbers.forEach((item, index) => {
		let getDataNumber = item.getBoundingClientRect().top;
		if (getDataNumber < windownHeight - collisionDistance) {
			if (onceActive === true) {
				let storageIncreaseNumber = item.getAttribute('data-azt');
				let x = setInterval(() => {
					item.textContent++;
					if (item.textContent == storageIncreaseNumber) {
						clearInterval(x);
					}

				}, 2000 / storageIncreaseNumber);
			}

		}
	});
	onceActive = false;
}

window.addEventListener("scroll", function () {
	let value = window.scrollY;
	handleSlideShowLeft(value);
	handleSlideShowRight(value);
	handleHeaderFixed(value);
	handleRevael();
	handleRevealRight();
	handleIncreaseNumberWhenScroll();
});
//

//
// let navigationContents = document.querySelectorAll("article .convertContent");

// let navigations = document.querySelectorAll('.header_bottom nav .li');

// function changeTabs(index) {
// 	navigations.forEach((navigation, index) => {

// 		navigation.classList.remove("convert");
// 		navigation.classList.remove("glow_white");
// 	})
// 	navigationContents.forEach((navigationContent, index) => navigationContent.classList.remove("addContent"));

// 	navigations[index].classList.add("convert");
// 	navigations[index].classList.add("glow_white");
// 	navigationContents[index].classList.add("addContent");
// }

// function showUpLoading() {
// 	let loading = document.querySelector(".loading");
// 	loading.classList.add("loading_show_up");
// 	setTimeout(() => {
// 		loading.classList.remove("loading_show_up");
// 	}, 1500)
// }

// navigations.forEach((navigation, index) => {
// 	navigation.addEventListener("click", e => {
// 		showUpLoading();
// 		let timeChange = setTimeout(() => {
// 			changeTabs(index)
// 		}, 1000);

// 	});
// });
//



let subnavs = document.querySelectorAll('.header_bottom nav .subnav li');
subnavs.forEach((item, index) => {
	item.addEventListener('click', e => {
		e.stopPropagation();
		showUpLoading();
		setTimeout(() => {
			navigationContents.forEach((navigationContent, index) => navigationContent.classList.remove("addContent"));
			navigationContents[5].classList.add("addContent");
		}, 500)

	});
});
// Video



let btnNavigationMobile = document.querySelector('.navigation_mobile');
let navBarFixed = document.querySelector('.navigation_bars');
let nav = navBarFixed.querySelector('nav');
let li = navBarFixed.querySelectorAll('li');
btnNavigationMobile.addEventListener('click', e => {
	navBarFixed.classList.remove('remove_active');
});
navBarFixed.addEventListener('click', e => {
	navBarFixed.classList.add('remove_active');

});

function handleMobile(indexx) {
	navigationContents.forEach((item, index) => {
		item.classList.remove('addContent');
	});
	navigationContents[indexx].classList.add('addContent')
}

nav.addEventListener('click', e => {
	e.stopPropagation();
	showUpLoading();
	li.forEach((item, indexx) => {
		item.addEventListener('click', e => {
			setTimeout(() => {
				handleMobile(indexx);
			}, 800)
		})
	});
});

;(function fake_loading() {
	const fake_loading = document.querySelector('.fake_loading');
	
	const main = document.querySelector('.slide_show');
	window.addEventListener('load', e => {
		setTimeout(() => {
			fake_loading.classList.add('hidden');
			main.classList.add('show');
		}, 2500);
	});
})();
