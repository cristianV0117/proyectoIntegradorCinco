class Login
{

	constructor()
	{
		this.route = '/login'
		this.formLogin = document.getElementById('login')
		this.alert = document.getElementById('alert')
		this.logOutLogin = document.getElementById('logOut')
	}

	login()
	{
		if (this.formLogin != null) {
			this.formLogin.addEventListener('submit', event => {
				event.preventDefault()
				let user = document.getElementById('user').value
				let password = document.getElementById('password').value
				const data = {
					'user': user,
					'password': password
				}
				fetch(this.route, {
					method: 'POST',
					headers: {
						'Accept': 'application/json',
                		'Content-Type': 'application/json'
					},
					body: JSON.stringify(data)
				}).then(json => {
					return json.json()
				}).then(response => {
					if (!response.error) {
						this.alert.innerHTML = `<hr /><div class="alert alert-success" role="alert">
													¡Bienvenido! ${response.message}
												</div>`;
						setTimeout(() => {
                            location.replace("/admin");
                        }, 1500);
					} else { 
						this.alert.innerHTML = `<hr /><div class="alert alert-danger" role="alert">
												  ¡UPS! ${response.message}
												</div>`
					}
				})
			})
		}
		return this;
	}

	logOut()
	{
		if (this.logOutLogin != null) {
			this.logOutLogin.addEventListener('click', () => {
				fetch(this.route, {
					method: 'GET'
				}).then(json => {
					return json.json()
				}).then(response => {
					if (!response.error) {
						location.replace('/');
					}
				})
			})
		}
		return this;
	}
}
(new Login()).login().logOut()
