

let video = document.querySelector(".about .video_description .video video");
let ambient = document.querySelector(".about .video_description .video .ambient");
let btn_playVideo = document.querySelector(".about .play_pause i:first-child");
let btn_pauseVideo = document.querySelector(".about .play_pause i:last-child");
let btn_volumeLow = document.querySelector(".about .controls_video .fa-volume-low");
let btn_volumeHigh = document.querySelector(".about .controls_video .fa-volume-high");
let btn_loopVideo = document.querySelector('.about .controls_video .fa-arrows-spin');
let btn_plusVideo = document.querySelector('.about .controls_video .fa-plus');
let btn_minusVideo = document.querySelector('.about .controls_video .fa-minus');
btn_playVideo.addEventListener('click', e => {
	btn_playVideo.classList.add('active_buttonPlay');
	btn_pauseVideo.classList.add('active_buttonPause');
	video.play();
	ambient.play();
});
btn_pauseVideo.addEventListener('click', e => {
	btn_playVideo.classList.remove('active_buttonPlay');
	btn_pauseVideo.classList.remove('active_buttonPause');
	video.pause();
	ambient.pause();
});
btn_volumeLow.addEventListener('click', e => {
	if (video.volume >= 0.1) {
		video.volume -= 0.1;
	}
});
btn_volumeHigh.addEventListener('click', e => {
	if (video.volume < 1) {
		video.volume += 0.1;
	}
});
var checkLoopVideo = true;
btn_loopVideo.addEventListener('click', e => {
	if (checkLoopVideo) {
		video.loop = true;
		ambient.loop = true;
		btn_loopVideo.classList.add('activeLoopVideo');
		checkLoopVideo = false;
	} else {
		video.loop = false;
		ambient.loop = false;
		btn_loopVideo.classList.remove('activeLoopVideo');
		checkLoopVideo = true;
	}
});
btn_plusVideo.addEventListener('click', e => {
	video.currentTime = Math.floor(video.currentTime) + 5;
	ambient.currentTime = Math.floor(ambient.currentTime) + 5;
	if (video.currentTime != ambient.currentTime) {
		ambient.currentTime = video.currentTime;
	}


});
btn_minusVideo.addEventListener('click', e => {
	video.currentTime = Math.floor(video.currentTime) - 5;
	ambient.currentTime = Math.floor(ambient.currentTime) - 5;
	if (video.currentTime != ambient.currentTime) {
		ambient.currentTime = video.currentTime;
	}
});
//
let backgroundAbout = document.querySelector('.about');
let btnChangBackground = document.querySelector('.about .show_change_background .item i');
let aboutDescriptionTitle = document.querySelector('.about .video_description .description h1');
let aboutDescriptionIncreaseNumber = document.querySelectorAll('.about .increase_number .controls .item p:last-child');
btnChangBackground.addEventListener('click', e => {
	backgroundAbout.classList.toggle("change_theme_about");
	aboutDescriptionTitle.classList.toggle("change_theme_about");
	btn_playVideo.classList.toggle('managerChangeBtn')
	btn_pauseVideo.classList.toggle('managerChangeBtn')
	btn_volumeLow.classList.toggle('managerChangeBtn')
	btn_volumeHigh.classList.toggle('managerChangeBtn')
	btn_loopVideo.classList.toggle('managerChangeBtn')
	btn_plusVideo.classList.toggle('managerChangeBtn')
	btn_minusVideo.classList.toggle('managerChangeBtn')
	aboutDescriptionIncreaseNumber.forEach((item, index) => {
		item.classList.toggle('change_theme_about');
	});
	ambient.classList.toggle('removeBlur')
});
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
	handleRevael();
	handleRevealRight();
	handleIncreaseNumberWhenScroll();
});
window.addEventListener('load', e => {
	const loader = document.querySelector('.loader');
	console.log(loader);
	setTimeout(() => {
		loader.style.visibility = "hidden";
		loader.style.opacity = "0";
		loader.style.transition = '.3s ease-in-out';
	}, 1000)
});
