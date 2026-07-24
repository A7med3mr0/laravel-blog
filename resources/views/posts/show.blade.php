
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post - Blog Dashboard</title>
    <style>
        /* Import Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: #1e293b;
            padding: 40px 20px;
            line-height: 1.7;
        }

        /* Main Container */
        .container {
            max-width: 850px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }

        /* Top Action Navbar */
        .post-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .btn-back {
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.2s;
        }

        .btn-back:hover {
            color: #0f172a;
        }

        .nav-actions {
            display: flex;
            gap: 10px;
        }

        /* General Button Styling */
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-edit {
            background-color: #fffbeb;
            color: #d97706;
        }

        .btn-edit:hover {
            background-color: #d97706;
            color: white;
        }

        .btn-delete {
            background-color: #fef2f2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background-color: #dc2626;
            color: white;
        }

        /* Blog Article Content Styling */
        .post-header {
            margin-bottom: 25px;
        }

        .post-category {
            display: inline-block;
            background-color: #eff6ff;
            color: #2563eb;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 15px;
            letter-spacing: 0.5px;
        }

        .post-title {
            font-size: 32px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.3;
            margin-bottom: 15px;
        }

        /* Meta Info (Author, Date) */
        .post-meta {
            display: flex;
            gap: 15px;
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
        }

        .author-name {
            color: #334155;
            font-weight: 600;
        }

        /* Placeholder for Cover Image */
        .post-cover {
            width: 100%;
            height: 350px;
            background-color: #e2e8f0;
            border-radius: 8px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-weight: 500;
            font-size: 16px;
            /* بمجرد وضع صورة حقيقية، يمكنك استبدال الخلفية بـ الـ Image */
            background-image: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%);
        }

        /* Article Body Text */
        .post-body {
            color: #334155;
            font-size: 17px;
        }

        .post-body p {
            margin-bottom: 20px;
        }

        .post-body blockquote {
            border-left: 4px solid #2563eb;
            padding-left: 20px;
            margin: 30px 0;
            font-style: italic;
            color: #475569;
            font-size: 18px;
        }

        /* Mobile Responsive */
        @media (max-width: 600px) {
            .post-nav {
                flex-direction: column;
                align-items: flex-start;
            }
            .nav-actions {
                width: 100%;
            }
            .nav-actions .btn {
                flex: 1;
                text-align: center;
            }
            .post-title {
                font-size: 26px;
            }
            .post-cover {
                height: 200px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="post-nav">
            <a href="{{ route('posts.index') }}" class="btn-back">← Back to Dashboard</a>
            <div class="nav-actions">
                <a class="btn btn-edit" href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit Post</a>
                <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                </form>
            </div>
        </div>

        <article>
            <div class="post-header">
                <span class="post-category">Category</span>
                <h1 class="post-title">{{ $post->title }}</h1>

                <div class="post-meta">
                    <span>By <span class="author-name">{{ $post->author_name }}</span></span>
                    <span>•</span>
                    <span>{{ $post->created_at->format('F j, Y') }}</span>
                </div>
            </div>



            <div class="post-body">
                <p>{{ $post->content }}</p>
            </div>
        </article>
    </div>

</body>
</html>
