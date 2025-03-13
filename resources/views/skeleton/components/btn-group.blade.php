<div class="col-md-12 d-flex justify-content-center gap-1">
    <button type="submit" class="btn btn-sm btn-{{ $color ?? 'success' }}" id="submit-btn">
        <i class="fa-solid fa-{{ $icon }} opacity-75"></i>&nbsp;&nbsp;{{ $name }}
    </button>
    <button type="button" class="btn btn-sm btn-warning" onclick="pageRefresh()">
        <i class="fa-solid fa-arrows-rotate opacity-75"></i>&nbsp;&nbsp;Refresh
    </button>
</div>
