<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Management Dashboard</title>
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
            max-width: 1100px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }

        /* Header Section Style with Create Button Layout */
        .header-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
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

        /* NEW: Create Post Button Style */
        .btn-create {
            background-color: #10b981; /* Green color */
            color: #ffffff;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
        }

        .btn-create:hover {
            background-color: #059669;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.3);
        }

        /* Responsive Table Container */
        .table-responsive {
            overflow-x: auto;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:hover {
            background-color: #f8fafc;
        }

        .author-name {
            font-weight: 600;
            color: #0f172a;
        }

        .blog-title {
            color: #334155;
            font-weight: 500;
        }

        /* Actions Cell & Buttons */
        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Show Button (Blue) */
        .btn-show {
            background-color: #eff6ff;
            color: #2563eb;
        }

        .btn-show:hover {
            background-color: #2563eb;
            color: #ffffff;
        }

        /* Edit Button (Amber/Orange) */
        .btn-edit {
            background-color: #fffbeb;
            color: #d97706;
        }

        .btn-edit:hover {
            background-color: #d97706;
            color: #ffffff;
        }

        /* Delete Button (Red) */
        .btn-delete {
            background-color: #fef2f2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background-color: #dc2626;
            color: #ffffff;
        }

        /* Responsive Design for Mobile Layout */
        @media (max-width: 650px) {
            .header-wrapper {
                flex-direction: column;
                align-items: flex-start;
            }
            .btn-create {
                width: 100%;
                text-align: center;
            }
            .actions {
                flex-direction: column;
                gap: 6px;
            }
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header Wrapper (Includes Title and Create Button) -->
        <div class="header-wrapper">
            <div class="header">
                <h2>Blog Articles Management</h2>
                <p>View, edit, or delete existing blog posts seamlessly.</p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" style="background: none; border: none; color: #dc2626; font-weight: 600; cursor: pointer;">
        Logout
    </button>
</form>
            <!-- Added Create Post Button -->
            <a style="text-decoration: none;" href="{{ route('posts.create') }}" class="btn-create">+ Create New Post</a>
        </div>

        @if(session('success'))
    <div style="background-color: #d1e7dd; color: #0f5132; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-weight: 600;">
        {{ session('success') }}
    </div>
@endif

        <!-- Table View -->
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Author Name</th>
                        <th>Article Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="author-name">{{ $post->author_name }}</td>
                            <td class="blog-title">{{ $post->title }}</td>
                            <td class="actions">
                                <a class="btn btn-show" href="{{ route('posts.show', ['post' => $post->id]) }}">Show</a>
                                <a class="btn btn-edit" href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
                                <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        </td>


                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
