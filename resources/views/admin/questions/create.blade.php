<h1>Nieuwe vraag toevoegen</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.questions.store') }}">
    @csrf
    <label>Vraag</label>
    <textarea name="question">{{ old('question') }}</textarea>

    <br><br>

    <label>Type</label>
    <select name="type">
        <option value="multiple_choice" @selected(old('type', 'multiple_choice') === 'multiple_choice')>Multiple choice</option>
        <option value="open" @selected(old('type') === 'open')>Open vraag</option>
    </select>

    <br><br>

    <label>Antwoord A</label>
    <input type="text" name="answer_a" value="{{ old('answer_a') }}">

    <br><br>

    <label>Antwoord B</label>
    <input type="text" name="answer_b" value="{{ old('answer_b') }}">

    <br><br>

    <label>Antwoord C</label>
    <input type="text" name="answer_c" value="{{ old('answer_c') }}">

    <br><br>

    <label>Juiste antwoord</label>
    <input type="text" name="correct_answer" value="{{ old('correct_answer') }}">

    <br><br>

    <label>Punten</label>
    <input type="number" name="points" value="{{ old('points', 10) }}">

    <br><br>

    <label>Feedback</label>
    <textarea name="feedback">{{ old('feedback') }}</textarea>

    <br><br>

    <button type="submit">Vraag opslaan</button>
</form>
