class ForgotPassword
{

	constructor()
	{
		this.route = '/forgot-password/email';
		this.searchEmail = document.getElementById('searchEmail')
		this.search()
	}

	search()
	{
		if (this.searchEmail != null) {
			this.searchEmail.addEventListener('submit', event => {
				event.preventDefault()
				let email = document.getElementById('email').value;
				const data = {
					"email": email
				};
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
						document.getElementById('response').innerHTML = `<hr /><div class="alert alert-success" role="alert">
																			${response.message}
																		</div>`;
					} else {
						document.getElementById('response').innerHTML = `<hr /><div class="alert alert-danger" role="alert">
																			${response.message}
																		</div>`;
					}
				})
			})
		}
		
		return this
	}
}
new ForgotPassword()