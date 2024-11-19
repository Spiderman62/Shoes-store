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
const customer = {
	getFunction: {},
	keyStorage: 'customerID',
	arrayExportDatas: [],
	validators: [
		checkBlank('#username-2'),
		checkLength('#username-2', 6),
		checkBlank('#email-2'),
		checkLength('#email-2', 6),
		checkEmail('#email-2'),
		checkBlank('#password-2'),
		checkLength('#password-2', 6),
		checkBlank('#re_password-2'),
		checkLength('#re_password-2', 6),
		checkConfirmPassword('#re_password-2', () => {
			return document.querySelector('#password-2').value;
		}),
		checkBlank('#typeShoes-2'),
	],
	setDataConfig() {
		const getStorage = JSON.parse(localStorage.getItem(this.keyStorage)) || { values: [] };
		return (exportData) => {
			getStorage.values.push(exportData);
			localStorage.setItem(this.keyStorage, JSON.stringify(getStorage));
		}
	},
	getDataConfig() {
		const getStorage = JSON.parse(localStorage.getItem(this.keyStorage));
		return getStorage;
	},
	handleDataInputs(selectors, validator) {
		const parentElements = selectors.parentElement;
		const errorElement = parentElements.querySelector('.error_message-2');
		const labels = parentElements.querySelector('label');
		const checkEachFunctions = this.getFunction[validator.selector];
		let hasError;
		for (let i = 0; i < checkEachFunctions.length; i++) {
			hasError = checkEachFunctions[i](selectors);
			if (hasError) break;
		}
		if (hasError) {
			labels.classList.add('moveTo')
			errorElement.innerText = hasError;
			parentElements.classList.add('hasError');
		} else {
			labels.classList.add('moveTo');
			errorElement.innerText = '';
			parentElements.classList.remove('hasError');
		}
		return !hasError;
	},
	handGetSelector() {
		this.validators.forEach(validator => {
			if (Array.isArray(this.getFunction[validator.selector])) {
				this.getFunction[validator.selector].push(validator.check);
			} else {
				this.getFunction[validator.selector] = [validator.check];
			}
			const selectors = document.querySelector(validator.selector);
			selectors.addEventListener('focus', e => {
				const parentElements = selectors.parentElement;
				const labels = parentElements.querySelector('label');
				labels.classList.add('moveTo');

			});
			selectors.addEventListener('blur', e => {
				this.handleDataInputs(selectors, validator);
			})
		});
	},
	isValid() {
		const form2 = document.querySelector('.submit-2');
		if (form2) {
			let isValid = true;
			form2.addEventListener('click', e => {
				this.validators.forEach(validator => {
					const selectors = document.querySelector(validator.selector);
					isValid = this.handleDataInputs(selectors, validator)
				});
				if (isValid) {
					e.preventDefault();
					const getDataOutputs = document.querySelectorAll('#form-2 [name]:not([disabled])');
					const exportData = Array.from(getDataOutputs).reduce((acc, current, index) => {
						acc[current.name] = current.value;
						return acc;
					}, {});
					this.setDataConfig()(exportData);
					this.render()
				} else {
					e.preventDefault();
				}
			});
		}
	},
	render() {
		if (this.getDataConfig()) {
			const htmls = this.getDataConfig().values.map((value, index) => {
				return `
				<div class="wrapper_data">
											<div class="id" data-index='${index}'><span>ID:</span> ${index}</div>
											<div class="name_customer"><span>Name:</span> ${value.username_2}</div>
											<div class="type_shoes"><span>Types:</span> ${value.typeShoes_2}</div>
											<div class="contact_email"><span>Email:</span> ${value.email_2}</div>
											<span class='mark'><i class='bx bx-x'></i></span>
										</div>
				`
			}).join('');
			document.querySelector('.render_datas').innerHTML = htmls;
		}
	},
	handleRemoveLocal(index) {
		const getStorage = JSON.parse(localStorage.getItem(this.keyStorage));
		getStorage.values.splice(index, 1);
		localStorage.setItem(this.keyStorage, JSON.stringify(getStorage));
		this.render();
	},
	handleEvents() {
		const render_data = document.querySelector('.render_datas');
		render_data.addEventListener('click', e => {
			const mark = e.target.closest('.mark');
			if (mark) {
				const parentElement = mark.parentElement;
				let getID = parseInt(parentElement.querySelector('.id').dataset.index);
				this.handleRemoveLocal(getID);
			}
		})
	},
	main() {
		this.handleEvents();
		this.handGetSelector();
		this.isValid();
		this.render();
	}
}
customer.main();
function checkBlank(value) {
	return {
		selector: value,
		check(checkValue) {
			return checkValue.value.trim() ? undefined : 'Can not be blank!!!'
		}
	}
}
function checkLength(value, min) {
	return {
		selector: value,
		check(checkValue) {
			return checkValue.value.length > min ? undefined : `Must be above ${min} characters!!!`;
		}
	}
}
function checkEmail(value) {
	return {
		selector: value,
		check(checkValue) {
			const regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return regexEmail.test(checkValue.value) ? undefined : 'Email không chính xác, vui lòng nhập lại!'
		}
	}
}


function checkConfirmPassword(value, callback) {
	return {
		selector: value,
		check(checkValue) {
			return checkValue.value === callback() ? undefined : 'Mật khẩu không khớp!!!'
		}
	}
};
const drag = {
	handEvents() {
		const containers = document.querySelectorAll('.drag_drop .container');
		const imgs = document.querySelectorAll('.drag_drop img');
		var get = null;
		containers.forEach(container => {
			container.addEventListener('dragover', e => {
				e.preventDefault();
				if (!container.querySelector('img')) {
					container.appendChild(get);
				}
			})
		})
		imgs.forEach(img => {
			img.addEventListener('dragstart', e => {
				e.target.style.opacity = '.5';
				e.target.style.transition = '.3s';
				get = e.target;
			});
			img.addEventListener('dragend', e => {
				e.target.style.opacity = '1'
			})
		})
	},
	main() {
		this.handEvents();
	}
}
drag.main();
window.addEventListener('load',e=>{
	const loader = document.querySelector('.loader');
	console.log(loader);
	setTimeout(()=>{
		loader.style.visibility = "hidden";
		loader.style.opacity = "0";
		loader.style.transition = '.3s ease-in-out';
	},1000)
});