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
	
	handleRevael();
	handleRevealRight();
	handleIncreaseNumberWhenScroll();
});

window.addEventListener('load',e=>{
	const loader = document.querySelector('.loader');
	console.log(loader);
	setTimeout(()=>{
		loader.style.visibility = "hidden";
		loader.style.opacity = "0";
		loader.style.transition = '.3s ease-in-out';
	},1000)
});