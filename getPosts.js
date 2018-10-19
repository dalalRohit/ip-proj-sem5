let template=document.getElementById('post-template').innerHTML;


async function loadPosts() {

	let resPosts=await axios.get(`https://jsonplaceholder.typicode.com/posts`);
	let posts=resPosts.data;

	posts.map( (post) => {
		var html=Mustache.render(template,{
		userId:post.userId,
		title:post.title,
		body:post.body
	});

	$('.allPosts').append(html);	

	})


}
