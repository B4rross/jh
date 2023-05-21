CREATE TRIGGER check_new_status
BEFORE UPDATE ON Ticket
WHEN OLD.sttus <> 'new' AND NEW.sttus = 'new'
BEGIN
    SELECT RAISE(ABORT, 'Cannot change status for "new".');
END;