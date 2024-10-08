@extends('layouts.app')

@section('content')
<!-- форма создания задачи -->
<div>
    <h2>Edit task</h2>
    <form action="{{ route('task.update', $task->id) }}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="title">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                placeholder="Заголовок задачи"
                value="{{ $task->title }}">
        </div>
        <div>
            <label for="description">Description</label>
            <input
                type="text"
                name="description"
                id="description"
                placeholder="Описание задачи"
                value="{{ $task->description }}">
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status">
                <option
                    value="new"
                    {{ $task->status == 'new' ? 'selected' : '' }}>
                    New
                </option>
                <option
                    value="in_progress"
                    {{ $task->status == 'in_progress' ? 'selected' : '' }}>
                    In progress
                </option>
                <option
                    value="completed"
                    {{ $task->status == 'completed' ? 'selected' : '' }}>
                    Completed
                </option>
            </select>
        </div>
        <div>
            <label for="user_id">Main user</label>
            <select name="user_id" id="user_id" value="{{ $task->user->id }}">
                @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ $user->id == $task->user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="executors">Executors</label>
            <select name="executors[]" id="executors" multiple>
                @foreach ($users as $user)
                <option
                    value="{{ $user->id }}"
                    {{ in_array($user->id, $task->executors->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Изменить задачу">
    </form>
</div>
@endsection
