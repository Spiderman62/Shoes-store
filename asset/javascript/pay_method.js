window.addEventListener('load',e=>{
	const loader = document.querySelector('.loader');
	console.log(loader);
	setTimeout(()=>{
		loader.style.visibility = "hidden";
		loader.style.opacity = "0";
		loader.style.transition = '.3s ease-in-out';
	},1000)
});

// const handle_form_sign_in = {
// 	contain_handle_function: {},
// 	selectors: [
// 		check_blank('#username'),
// 		check_length('#username', 6),
// 		check_is_special_character('#username'),
// 		check_blank('#address'),
// 		check_length('#address', 8),
// 		check_blank('#number_phone'),
// 		check_length('#number_phone', 10),
// 		check_is_number('#number_phone')
// 	],
// 	handle_check_validate(item) {
// 		const input_element = document.querySelector(item.selector);
// 		// Gọi đối tượng chứa key là selector và value là những giá trị trả về của hàm
// 		const get_handle_function = this.contain_handle_function[item.selector];
// 		const parent_element = input_element.parentElement;
// 		const error_element = parent_element.querySelector('.error_message');
// 		let find_error;
// 		// vòng lặp dùng để lặp qua từng hàm
// 		// VD ta có value và sẽ dùng value đó để gọi hàm kiểm tra liên tiếp
// 		for (let i = 0; i < get_handle_function.length; i++) {
// 			// trước khi kiểm tra phải xác định input này nó thuộc type nào
// 			switch (input_element.type) {
// 				case 'file':
// 					find_error = get_handle_function[i](input_element.value.trim());
// 					break;
				
// 				default:
// 					find_error = get_handle_function[i](input_element.value.trim());

// 			}
// 			if (find_error) break;
// 		}
// 		if (find_error) {
// 			parent_element.classList.add('error');
// 			error_element.innerText = find_error;
// 		} else {
// 			parent_element.classList.remove('error');
// 			error_element.innerText = "";
// 		};
// 		return !find_error;
// 	},
// 	handle_submit_to_SERVER() {
// 		const form = document.querySelector('.wrapper_address .infor-address');
// 		form.addEventListener('submit', e => {
			
// 			var is_submit = true;
// 			this.selectors.forEach(item => {
// 				const is_valid = this.handle_check_validate(item);
// 				console.log(is_valid);
// 				if (!is_valid) {
// 					is_submit = false;
// 				}
// 			});
// 			if (is_submit) {
// 				form.submit();	
// 			} else {
// 				e.preventDefault();

// 			}
// 		});
// 	},
// 	handle_event_blur_AND_focus_of_input() {
// 		// Lặp qua những giá trị khi gọi hàm chứa những selector và kiểm tra hàm
// 		this.selectors.forEach((item, index) => {
// 			// lặp để lấy key là selector và value là những giá trị của hàm
// 			// vì để tránh bị đè selector khi dùng hàm kiểm tra
// 			if (Array.isArray(this.contain_handle_function[item.selector])) {
// 				this.contain_handle_function[item.selector].push(item.check_validate);
// 			} else {
// 				this.contain_handle_function[item.selector] = [item.check_validate];
// 			}
			
// 			const input_element = document.querySelector(item.selector);
// 			const parent_element = input_element.parentElement;
// 			const error_element = parent_element.querySelector('.error_message');
// 			input_element.addEventListener('blur', e => {
// 				this.handle_check_validate(item);

// 			});
// 			input_element.addEventListener('input', e => {
// 				parent_element.classList.remove('error');
// 				error_element.innerText = "";
// 			});
// 		});

// 	},
// 	main() {
// 		// Gọi hàm thực hiện xử lý blur
// 		this.handle_event_blur_AND_focus_of_input();
// 		this.handle_submit_to_SERVER();
// 	}
// };
// handle_form_sign_in.main();

// function check_blank(selector) {
// 	return {
// 		selector: selector,
// 		check_validate(value) {
// 			return value === "" ? 'Không được để trống' : undefined;
// 		}
// 	}
// };
// function check_length(selector, min) {
// 	return {
// 		selector: selector,
// 		check_validate(value) {
// 			return value.length < min ? `Bắt buộc phải trên ${min} ký tự` : undefined;
// 		}
// 	}
// };
// function check_is_email(selector) {
// 	return {
// 		selector: selector,
// 		check_validate(value) {
// 			const regex_email = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;;
// 			return !regex_email.test(value) ? 'Email không chính xác' : undefined;
// 		}
// 	}
// }
// function check_match(selector, callback) {
// 	return {
// 		selector: selector,
// 		check_validate(value) {
// 			return value !== callback() ? 'Mật khẩu không khớp' : undefined;
// 		}
// 	}
// }
// function check_is_special_character(selector) {
// 	return {
// 		selector: selector,
// 		check_validate(value) {
// 			const regex_special_characters = /^[^~`!@#$%^&*()+=\[\]{}|;':",<>/?]*$/;
// 			return !regex_special_characters.test(value) ? "Không được chứa những ký tự đặc biệt!" : undefined;
// 		}
// 	}
// }
// function check_is_number(selector) {
// 	return {
// 		selector: selector,
// 		check_validate(value) {

// 			for (let i = 0; i < value.trim().length; i++) {
// 				if (isNaN(parseInt(value[i]))) {
// 					return 'Bắt buộc phải là số!';
// 				}
// 			}
// 			return undefined;
// 		}
// 	}
// }
