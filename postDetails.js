document.addEventListener('DOMContentLoaded', async () => {
    const postId = new URLSearchParams(window.location.search).get('id');
    if (!postId) {
        document.getElementById('postContainer').innerHTML = 'Пост не найден.';
        return;
    }

    await renderPost(postId);
    await renderComments(postId);
});

async function renderPost(postId) {
    try {
        const response = await fetch(`https://jsonplaceholder.typicode.com/posts/${postId}`);
        const post = await response.json();
        const postHtml = `
            <div class="post">
                <h1>${post.title}</h1>
                <p>${post.body}</p>
            </div>
        `;
        document.getElementById('postContainer').innerHTML = postHtml;
    } catch (error) {
        document.getElementById('postContainer').innerHTML = 'Ошибка при загрузке поста.';
        console.error('Error loading post:', error);
    }
}

async function renderComments(postId) {
    try {
        const response = await fetch(`https://jsonplaceholder.typicode.com/posts/${postId}/comments`);
        const comments = await response.json();
        const commentsHtml = comments.map(comment => `
            <div class="comment">
                <strong>${comment.name}</strong> (${comment.email})
                <p>${comment.body}</p>
            </div>
        `).join('');
        document.getElementById('commentsContainer').innerHTML = commentsHtml;
    } catch (error) {
        document.getElementById('commentsContainer').innerHTML = 'Ошибка при загрузке комментариев.';
        console.error('Error loading comments:', error);
    }
}
