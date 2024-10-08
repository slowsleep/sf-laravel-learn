@extends('layouts.app')

@section('content')
<!-- форма создания задачи -->
<div>
    <h1>TASKS</h1>
    <h2>Create task</h2>
    <form action="{{ route('task.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Заголовок задачи">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Описание задачи">
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status">
                <option value="new">New</option>
                <option value="in_progress">In progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div>
            <label for="user_id">Main user</label>
            <select name="user_id" id="user_id">
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="executors">Executors</label>
            <select name="executors[]" id="executors" multiple>
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Создать задачу">
    </form>
</div>

<!-- список задач -->
<div>
    @foreach ($tasks as $task)
    <div class="task">
        <p>Название: {{ $task->title }}</p>
        <p>Описание: {{ $task->description }}</p>
        <p>Постановщик: {{ $task->user->name }}</p>
        <p>Статус: {{ $task->status }}</p>
        <p>Исполнители: </p>
        @foreach ($task->executors as $executor)
        <p class="task__executor">{{ $executor->name }}</p>
        @endforeach

        <form action="{{ route('task.destroy', $task->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить">
        </form>

        <a href="{{ route('task.edit', $task->id) }}">Редактировать</a>
    </div>
    @endforeach
</div>
@endsection
