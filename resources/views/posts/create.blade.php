<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post</title>
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
        }

        /* Main Container */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }

        /* Header Section */
        .header {
            margin-bottom: 30px;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h2 {
            color: #0f172a;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .header p {
            color: #64748b;
            font-size: 15px;
        }

        /* Back to Dashboard Link */
        .btn-back {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.2s;
        }

        .btn-back:hover {
            text-decoration: underline;
            color: #1d4ed8;
        }

        /* Form Layout */
        .form-group {
            margin-bottom: 24px;
        }

        /* Grouping fields on the same row */
        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-weight: 600;
            font-size: 14px;
        }

        /* Input Styles */
        input[type="text"],
        select,
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            color: #1e293b;
            background-color: #fff;
            transition: all 0.2s ease-in-out;
            outline: none;
        }

        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 180px;
        }

        input[type="file"] {
            padding: 8px;
            background-color: #f8fafc;
            cursor: pointer;
        }

        /* Action Buttons Wrapper */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 35px;
            border-top: 1px solid #e2e8f0;
            padding-top: 25px;
        }

        /* Buttons Styling */
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            text-decoration: none;
        }

        .btn-cancel {
            background-color: #f1f5f9;
            color: #475569;
        }

        .btn-cancel:hover {
            background-color: #e2e8f0;
        }

        .btn-submit {
            background-color: #10b981;
            color: white;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.15);
        }

        .btn-submit:hover {
            background-color: #059669;
            transform: translateY(-1px);
        }

        /* Mobile Responsive adjustments */
        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            .form-actions {
                flex-direction: column-reverse;
            }
            .btn {
                width: 100%;
                text-align: center;
            }
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <div>
                <h2>Create New Post</h2>
                <p>Fill in the details below to publish a new blog article.</p>
            </div>
            <a href="{{ route('posts.index') }}" class="btn-back">← Back to Dashboard</a>
        </div>

        <!-- Form Form -->
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <!-- Article Title -->
            <div class="form-group">
                <label for="title">Article Title</label>
                <input type="text" id="title" name="title" placeholder="write the title" required>
            </div>

            <!-- Row for Author and Category -->
            <div class="form-row">
                <!-- Author Name -->
                <div class="form-group">
                    <label for="author">Author Name</label>
                    <input type="text" id="author" name="author_name" placeholder="Your Name" required>
                </div>

                <!-- Category -->
                
            </div>

            <!-- Cover Image -->


            <!-- Article Content -->
            <div class="form-group">
                <label for="content">Article Content</label>
                <textarea id="content" name="content" placeholder="Write your thoughts here..." required></textarea>
            </div>

            <!-- Buttons Layout -->
            <div class="form-actions">
                <a type="button" class="btn btn-cancel" href="{{ route('posts.index') }}">Cancel</a>
                <button type="submit" class="btn btn-submit">Publish Post</button>
            </div>

        </form>
    </div>

</body>
</html>
