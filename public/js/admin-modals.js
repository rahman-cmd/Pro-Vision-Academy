(function () {
    function openModal(id) {
        var modal = typeof id === 'string' ? document.getElementById(id) : id;
        if (!modal) return false;
        modal.classList.add('is-open');
        document.body.classList.add('admin-modal-open');
        return true;
    }

    function closeModal(id) {
        var modal = typeof id === 'string' ? document.getElementById(id) : id;
        if (!modal) return;
        modal.classList.remove('is-open');
        if (!document.querySelector('.admin-modal.is-open')) {
            document.body.classList.remove('admin-modal-open');
        }
    }

    function closeAllModals() {
        document.querySelectorAll('.admin-modal.is-open').forEach(function (modal) {
            modal.classList.remove('is-open');
        });
        document.body.classList.remove('admin-modal-open');
    }

    function bindModal(modal) {
        modal.querySelectorAll('[data-modal-close]').forEach(function (el) {
            el.addEventListener('click', function (e) {
                e.preventDefault();
                closeModal(modal);
            });
        });
    }

    function parsePayload(raw) {
        if (!raw) return {};
        try {
            var binary = atob(raw);
            var json;
            if (typeof TextDecoder !== 'undefined') {
                var bytes = new Uint8Array(binary.length);
                for (var i = 0; i < binary.length; i++) bytes[i] = binary.charCodeAt(i);
                json = new TextDecoder('utf-8').decode(bytes);
            } else {
                json = decodeURIComponent(escape(binary));
            }
            return JSON.parse(json);
        } catch (e1) {
            try {
                return JSON.parse(raw);
            } catch (e2) {
                console.error('AdminModal: invalid payload', e2);
                return {};
            }
        }
    }

    function fillForm(form, data) {
        if (!form || !data) return;
        Object.keys(data).forEach(function (key) {
            var el = form.querySelector('[name="' + key + '"]');
            if (!el) return;
            var value = data[key];
            if (value === null || value === undefined) value = '';
            if (el.type === 'checkbox') {
                el.checked = value === '1' || value === 1 || value === true || value === 'true';
            } else if (el.tagName === 'SELECT' || el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
                el.value = value;
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Move modals to body so fixed positioning is never clipped by layout ancestors
        document.querySelectorAll('.admin-modal').forEach(function (modal) {
            if (modal.parentElement !== document.body) {
                document.body.appendChild(modal);
            }
            bindModal(modal);
        });

        document.addEventListener('click', function (e) {
            var openBtn = e.target.closest('[data-modal-open]');
            if (openBtn) {
                e.preventDefault();
                openModal(openBtn.getAttribute('data-modal-open'));
                return;
            }

            var editBtn = e.target.closest('[data-modal-edit]');
            if (!editBtn) return;

            e.preventDefault();
            var modalId = editBtn.getAttribute('data-modal-edit');
            var formId = editBtn.getAttribute('data-form');
            var form = formId ? document.getElementById(formId) : null;
            if (!form) return;

            var updateUrl = editBtn.getAttribute('data-update-url');
            if (updateUrl) form.action = updateUrl;

            var data = parsePayload(editBtn.getAttribute('data-payload'));
            fillForm(form, data);

            var fileInput = form.querySelector('input[type="file"]');
            if (fileInput) fileInput.value = '';

            openModal(modalId);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeAllModals();
        });
    });

    window.AdminModal = {
        open: openModal,
        close: closeModal,
        closeAll: closeAllModals,
        parsePayload: parsePayload,
        fillForm: fillForm,
        fillFromDataset: function (form, dataset, map) {
            Object.keys(map).forEach(function (field) {
                var el = form.querySelector('[name="' + field + '"], #' + map[field]);
                if (!el) return;
                var key = map[field];
                var value = dataset[key] || '';
                if (el.type === 'checkbox') {
                    el.checked = value === '1' || value === 'true';
                } else if (el.tagName === 'SELECT' || el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
                    el.value = value;
                }
            });
        }
    };
})();
