/**
 * Components Javascript do Uikit 
 * @version 1.0.0
 * @copyright Felipe Oliveira Lourenço 03.11.2020
 */

import { lilooRequest } from './../liloo2.js'

export const Accounts = {

	listAccountsCardUikit: (obj) => {
		let url = obj.url
		let method = obj.method
		let el = obj.element
		// let tpl = obj.tpl 
		new lilooRequest({
			url: url,
			method: method || 'POST'
		}).then((data) => {
			console.log(data)
			let view = '';
			$.each(data, function (i, prop) {
				view += `
				<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m uk-margin">
					<h3 class="uk-card-title">${prop.account_name}</h3>
					<p>
						<b>E-mail:</b> ${prop.account_email}<br>
						<b>Cadastrado:</b> ${prop.account_registered}<br>
						<b>Total de moedas:</b> ${prop.account_coin}<br>
						<b>Nível de premissão:</b> ${prop.account_level}
					</p>
				</div>`	
			})
			document.querySelector(el).innerHTML = view
		})
	},

	Card: (props) => {
		return (`
 			<div>
 			<h2>${props.title}</h2>
 			<p>${props.content}</p>
 			<a href="${props.href}">${props.button}</a>
 			</div>
 		`)
	},

}

// export { Accounts }


// return data.map((item) => {
// return (
// 	`
// 	<div class="uk-card uk-card-default uk-card-body uk-width-1-1@m uk-margin">
// 		<h3 class="uk-card-title">${item.account_name}</h3>
// 		<p>
// 			<b>E-mail:</b> ${item.account_email}<br>
// 			<b>Cadastrado:</b> ${item.account_registered}<br>
// 			<b>Total de moedas:</b> ${item.account_coin}<br>
// 			<b>Nível de premissão:</b> ${item.account_level}
// 		</p>
// 	</div>
// 	`
// )
// }).join('')


// async function getPerson(file) {
// 	let response = await fetch(file);
// 	return await response.text();
// }
// // Declarando as TPL
// const tpl = {
// 	card_uikit: await getPerson('./listview/card_uikit.tpl'),
// 	card_ikit: await getPerson('./listview/card_uikit.tpl')
// }


// function tplFill(filename, element){  	
// 	// LÃª o arquivo *.tpl
// 	fetch(filename).then((resp) => resp.text()).then(function(data) {
// 		var $Tpl = new DOMParser().parseFromString(data, "text/html")
// 		// document.querySelector(element).innerHTML = $Tpl.documentElement.innerHTML
// 		console.log( $Tpl )
// 	})
// 	// Procurar por '#' e faz o split()
// 	// Separa em Array ou Objetos
// 	// Povoa a Tpl e Renderiza
// }
// tplFill('./listview/card_uikit.tpl')


// async function file_get_contents(filename) {
//     return fetch(filename)
// 		.then((resp) => resp.text())
// 		.then(function(data) {
//         	// console.log(data)
// 			return data;
//     	});
// }


// async function fileGetContents(uri, callback) {
// 	let res = await fetch(uri),
// 		ret = await res.text();
// 	return callback ? callback(ret) : ret; // a Promise() actually.
// }
// fileGetContents("./listview/card-uikit.tpl", console.log);
// fileGetContents("./listview/card-uikit.tpl").then((ret) => {});


//  getPerson().then(data => console.log(data));
// new lilooRequest({
//     url: 'http://localhost/liloocloud2/modules/accounts/create/',
//     method: 'POST'
// }).then((data) => {
//     return data
// })

// $('app').html(Accounts.List())
// console.log(
// )

// new lilooRequest({

//     url: 'http://localhost/liloocloud2/modules/accounts/create/',
//     method: 'POST'

// })
// .then((data) => {
//     // console.log(data)
//     $.each(data, function (i, obj) {
//         $('app').append(  Accounts.List(obj)  )
//     })
// })