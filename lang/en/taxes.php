<?php

return [
    'title'       => 'Taxes',
    'subtitle'    => 'Track your tax payments and documents',
    'create_tax'  => 'Add Tax',
    'edit_tax'    => 'Edit Tax',
    'no_taxes'    => 'No taxes yet',
    'no_taxes_description' => 'Record your first tax payment',
    'confirm_delete' => 'Are you sure you want to delete this tax?',

    'description'    => 'Description',
    'amount'         => 'Amount',
    'due_date'       => 'Due Date',
    'paid_at'        => 'Paid At',
    'reference_year' => 'Reference Year',
    'attachment'     => 'Tax Document',
    'notes'          => 'Notes',

    'all_years'   => 'All Years',
    'all_types'   => 'All Types',
    'all_statuses' => 'All',
    'paid'        => 'Paid',
    'unpaid'      => 'Unpaid',

    'created_successfully' => 'Tax created successfully',
    'updated_successfully' => 'Tax updated successfully',
    'deleted_successfully' => 'Tax deleted successfully',

    'attachment_uploaded_successfully' => 'Document uploaded successfully',
    'attachment_deleted_successfully'  => 'Document deleted successfully',
    'attachment_not_found'             => 'Document not found',
    'attachment_required'              => 'File is required',
    'attachment_mimes'                 => 'Only PDF, JPG, JPEG, PNG files are allowed',
    'attachment_max'                   => 'File size must not exceed 10MB',

    'stats' => [
        'total_all_time'  => 'Total All Time',
        'total_this_year' => 'This Year',
        'unpaid_amount'   => 'Unpaid',
        'count_this_year' => 'Taxes This Year',
        'paid_total'      => 'Total paid',
        'due'             => 'Amount due',
        'scheduled'       => 'Scheduled',
    ],

    'placeholder' => [
        'search'         => 'Search by description...',
        'amount'         => 'e.g., 1500.00',
        'description'    => 'e.g., Income tax balance 2025',
        'reference_year' => 'e.g., 2025',
        'notes'          => 'Additional notes...',
    ],

    'calendar_title'          => 'Tax due :due_date – :description (:year)',
    'calendar_description'    => 'Tax payment due',
    'add_to_calendar'         => 'Add to Google Calendar',

    'description_required'    => 'Description is required',
    'amount_required'         => 'Amount is required',
    'amount_min'              => 'Amount must be at least 0.01',
    'due_date_required'       => 'Due date is required',
    'reference_year_required' => 'Reference year is required',
];
