let template=document.getElementById('post-template').innerHTML;
var dt=moment().format('MMM Do YY h:mm:ss a');

async function loadPosts() {

	let resPosts=await axios.get(`https://jsonplaceholder.typicode.com/posts`);
	let posts=resPosts.data;
	console.log(dt);
	posts.map( (post) => {
		post.time=dt;
		var html=Mustache.render(template,{
		userId:post.userId,
		title:post.title,
		body:post.body,
		time:post.time
	});

	$('.allPosts').append(html);	

	})


}
