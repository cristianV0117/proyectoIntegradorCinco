class Users
{
	constructor()
	{
		this.route = "/usuarios"
		this.create = document.getElementById('create')
		this.alert = document.getElementById('alert')
		this.delete = document.getElementsByClassName('delete')
		this.update = document.getElementById('edit')
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
				let area = document.getElementById("areas").value
				const data = {
					'firstName': firstName,
					'secondName': secondName,
					'firstLastName': firstLastName,
					'secondLastName': secondLastName,
					'documentUser': documentUser,
					'email': email,
					'password': password,
					'area': parseInt(area)
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

	edit()
	{
		if (this.update != null) {
			this.update.addEventListener('submit', event => {
				event.preventDefault()
				let firstName = document.getElementById('firstNameEdit').value
				let secondName = document.getElementById('secondNameEdit').value
				let firstLastName = document.getElementById('firstLastNameEdit').value
				let secondLastName = document.getElementById('secondLastNameEdit').value
				let documentUser = document.getElementById('documentUserEdit').value
				let email = document.getElementById('emailEdit').value
				let area = document.getElementById("areasEdit").value
				let id = document.getElementById('id').value
				const data = {
					'firstName': firstName,
					'secondName': secondName,
					'firstLastName': firstLastName,
					'secondLastName': secondLastName,
					'documentUser': documentUser,
					'email': email,
					'area': parseInt(area)
				}
				fetch(`${this.route}/${id}`, {
					method: 'PUT',
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
                            location.reload()
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

	destroy()
	{
		if (!this.delete != null) {
			for (let i = 0; i < this.delete.length; i++) {
				this.delete[i].addEventListener('click', () => {
					Swal.fire({
						  title: 'Esta seguro?',
						  icon: 'warning',
						  showCancelButton: true,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Eliminar',
						  cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
						    let id = this.delete[i].getAttribute('key')
						    fetch(this.route + `/${id}`, {
						    	method: 'DELETE'
						    }).then(json => {
						    	return json.json()
						    }).then(response => {
						    	if (!response.error) {
						    		setTimeout(() => {
			                            location.replace("/usuarios");
			                        }, 1000);
						    	} else {
						    		alert(response.message)
						    	}
						    })
						}
					})
					
				})
			}
		}
		return this
	}
}
(new Users()).store().destroy().edit()