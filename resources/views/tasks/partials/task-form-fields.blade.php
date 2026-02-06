@php($p = $prefix ?? '')

<div class="row g-3">
    <div class="col-12">
        <label class="form-label">Title</label>
        <input name="{{ $p }}title" class="form-control soft-input" required maxlength="255" placeholder="e.g., Finish Assignment">
    </div>

    <div class="col-12">
        <label class="form-label">Description (optional)</label>
        <textarea name="{{ $p }}description" class="form-control soft-input" rows="3" placeholder="Extra notes..."></textarea>
    </div>

    <div class="col-12 col-md-6">
        <label class="form-label">Date</label>
        <input type="date" name="{{ $p }}task_date" class="form-control soft-input" required>
    </div>

    <div class="col-12 col-md-6">
        <label class="form-label">Time (optional)</label>
        <input type="time" name="{{ $p }}task_time" class="form-control soft-input">
    </div>

    <div class="col-12 col-md-6">
        <label class="form-label">Priority</label>
        <select name="{{ $p }}priority_color" class="form-select soft-input" required>
            <option value="red">Red 🔴</option>
            <option value="green">Green 🟢</option>
            <option value="blue" selected>Blue 🔵</option>
            <option value="yellow">Yellow 🟡</option>
            <option value="purple">Purple 🟣</option>
        </select>
    </div>

    <div class="col-12 col-md-6">
        <label class="form-label">Status</label>
        <select name="{{ $p }}status" class="form-select soft-input" required>
            <option value="pending" selected>Pending ⏳</option>
            <option value="ongoing">Ongoing 🔄</option>
            <option value="done">Done ✅</option>
        </select>
    </div>

    <div class="col-12">
        <label class="form-label">Notify at (optional)</label>
        <input type="datetime-local" name="{{ $p }}notify_at" class="form-control soft-input">
        <div class="form-text">We’ll connect this to notifications later 🔔</div>
    </div>
</div>