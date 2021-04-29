class Users
{
	constructor()
	{
		this.route = "/usuarios"
		this.create = document.getElementById('create')
		this.alert = document.getElementById('alert')
	}

	store()
	{
		if (this.create != null) {
			this.create.addEventListener('submit', event => {
				event.preventDefault();
				let firstName = document.getElementById('firstName').value
				let secondName = document.getElementById('secondName').value
				let firstLastName = document.getElementById('firstLastName').value
				let secondLastName = document.getElementById('secondLastName').value
				let documentUser = document.getElementById('documentUser').value
				let email = document.getElementById('email').value
				let password = document.getElementById('password').value
				const data = {
					'firstName': firstName,
					'secondName': secondName,
					'firstLastName': firstLastName,
					'secondLastName': secondLastName,
					'documentUser': documentUser,
					'email': email,
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
													${response.message}
												</div>`;
						setTimeout(() => {
                            location.replace("/usuarios");
                        }, 1500);
					} else { 
						this.alert.innerHTML = `<hr /><div class="alert alert-danger" role="alert">
												  ¡UPS! ${response.message}
												</div>`
					}
				})

			})
		}
		return this
	}
}
(new Users()).store()