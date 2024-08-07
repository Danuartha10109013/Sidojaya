
//INI UNTUK BAGIAN PENCARIAN DAN JUGA KATEGORI PADA HALAMAN ARTIKEL
document.addEventListener("DOMContentLoaded", function() {
					const tabsBox = document.querySelector(".tabs-box");
					const semuaBox = document.querySelector('.semua');
					const searchInput = document.getElementById('search');
					const arrowIcons = document.querySelectorAll(".icon i");
					let isDragging = false;
					const allTabs = document.querySelectorAll(".tab");
					const handleIcons = () => {
						let scrollVal = Math.round(tabsBox.scrollLeft);
						let maxScrollableWidth = tabsBox.scrollWidth - tabsBox.clientWidth;
						arrowIcons[0].parentElement.style.display = scrollVal > 0 ? "flex" : "none";
						arrowIcons[1].parentElement.style.display = maxScrollableWidth > scrollVal ? "flex" : "none";
					}
					arrowIcons.forEach(icon => {
						icon.addEventListener("click", () => {
							tabsBox.scrollLeft += icon.id === "left" ? -350 : 350;
							setTimeout(() => handleIcons(), 50);
						});
					});
					allTabs.forEach(tab => {
						tab.addEventListener("click", () => {
							document.querySelector(".tab.active").classList.remove("active");
							tab.classList.add("active");
							localStorage.setItem('activeTab', tab.dataset.category);
						});
					});
					const dragging = (e) => {
						if (!isDragging) return;
						tabsBox.classList.add("dragging");
						tabsBox.scrollLeft -= e.movementX;
						handleIcons();
					}
					const dragStop = () => {
						isDragging = false;
						tabsBox.classList.remove("dragging");
					}
					tabsBox.addEventListener("mousedown", () => isDragging = true);
					tabsBox.addEventListener("mousemove", dragging);
					document.addEventListener("mouseup", dragStop);

					const activeTab = localStorage.getItem('activeTab');
					if (activeTab) {
						document.querySelector(`.tab[data-category="${activeTab}"]`).classList.add('active');
					} else {
						semuaBox.classList.add('active');
					}
				});


                document.addEventListener("DOMContentLoaded", function() {
					var categories = document.querySelectorAll('.category');
					var searchInput = document.getElementById('search');
					searchInput.addEventListener('keypress', function(event) {
						if (event.key === 'Enter') {
							filterProduct();
						}
					});
					categories.forEach(function(category) {
						category.addEventListener('click', function() {
							var selectedCategory = this.getAttribute('data-category');
							localStorage.setItem('activeTab', selectedCategory);
							filterProduct();
						});
					});
				});

				function filterProduct() {
					var search = document.getElementById('search').value.trim();
					var selectedCategory = localStorage.getItem('activeTab');

					var url = window.location.href.split('?')[0];
					var params = new URLSearchParams(window.location.search);

					if (selectedCategory === 'Semua') {
						params.delete('category');
					} else {
						params.set('category', selectedCategory);
					}
					if (search !== '') {
						params.set('search', search);
					} else {
						params.delete('search');
					}
					var queryString = decodeURIComponent(params.toString().replace(/\+/g, '%20'));
					window.location.href = url + '?' + queryString;
				}