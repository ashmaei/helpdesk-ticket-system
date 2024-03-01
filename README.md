#### HELPDESK TICKETING SYSTEM ####


#### Objective - Idea
1. Create a new ticket - User
2. Reply on ticket - Admin
3. Reject or Resolve ticket - Admin
4. Email(SMTP) *yopmail notification when admin update ticket - User
5. Give ticket title & description - User
6. Upload a attachment - User 



#### Table Structure
1. Tickets
 - title (string) {required}
 - description (text) {required}
 - status (open{default}, resolved, rejected)
 - attachment (string) {nullable}
 - user_id (int) {required} filled by laravel/ backend
 - status_changed_by_id (int) {nullable}

2. Replies
 - body (text) {required}
 - user_id (int) {required} filled by laravel/ backend
 - ticket_id (int) {required} filled by laravel/ backend   