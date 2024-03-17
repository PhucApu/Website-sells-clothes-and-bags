-- Tạo bảng đối tượng Accounts

CREATE TABLE accounts
(
       userName VARCHAR(255) PRIMARY KEY NOT NULL,
       passWord VARCHAR(255),
       dateCreated DATE,
       accountStatus VARCHAR(255),
       name VARCHAR(255),
       address VARCHAR(255),
       email VARCHAR(255),
       phoneNumber VARCHAR(255),
       birth DATE,
       sex VARCHAR(255),

       codePermissions VARCHAR(255)
);

-- Tạo đối tượng Feedback 

CREATE TABLE feedback
(
       userName VARCHAR(255),
       sentDate DATE,
       email VARCHAR(255),
       content VARCHAR(255),
       -- Adjust the data type based on your database system (e.g., VARCHAR(MAX) for SQL Server, TEXT for MySQL)
       state VARCHAR(255)
);

-- Tạo đối tượng Comment

CREATE TABLE comment
(
       -- Username of the person providing feedback 
       -- thuộc tính khóa ngoại
       userName VARCHAR(255),

       -- Date when the feedback was sent
       sentDate DATE,

       -- Email associated with the feedback
       email VARCHAR(255),

       -- Content of the feedback message
       content VARCHAR(255),
       -- Adjust the data type based on your database system (e.g., VARCHAR(MAX) for SQL Server, TEXT for MySQL)

       -- State of the feedback (e.g., 'Pending', 'Approved', 'Rejected', etc.)
       state VARCHAR(255),

       -- Number of likes received for the feedback
       likeNumber INT,

       -- Number of dislikes received for the feedback
       dislikeNumber INT
);

-- Tạo đối tượng Permissions

CREATE TABLE permissions
(
       -- Code representing the permission (Primary Key, Not Null)
       codePermissions VARCHAR(255) PRIMARY KEY NOT NULL,

       -- Name describing the permission
       namePermissions VARCHAR(255)
);

-- Tạo đối tượng Functions

CREATE TABLE functions
(
       -- Code representing the function (Primary Key, Not Null)
       functionCode VARCHAR(255) PRIMARY KEY NOT NULL,

       -- Name of the function
       functionName VARCHAR(255)
);

-- Tạo đối tượng PermissionsDetail

CREATE TABLE permissionsDetail
(
       -- Foreign Key referencing the Permissions table
       codePermissions VARCHAR(255),

       -- Foreign Key referencing the Functions table
       functionCode VARCHAR(255),

       -- Permissions columns
       addPermission INT,
       seePermission INT,
       deletePermission INT,
       fixPermission INT
);

-- Tạo đối tượng Orders

CREATE TABLE orders
(
       -- Primary Key, Not Null
       orderCode VARCHAR(255) PRIMARY KEY NOT NULL,

       -- Dates
       dateCreated DATE,
       dateDelivery DATE,
       dateFinish DATE,

       -- User information
       userName VARCHAR(255),

       -- Financial information
       totalMoney FLOAT,

       -- Payment and transport codes
       -- Thuộc tính khóa ngoại tham chiếu 
       codePayments VARCHAR(255),
       codeTransport VARCHAR(255),

       -- Order status
       status VARCHAR(255),

       -- Additional notes
       note VARCHAR(255)
);

-- Tạo đối tượng OrderDetail

CREATE TABLE orderDetail
(
       -- thuộc tính khóa ngoại orderCode và productCode
       orderCode VARCHAR(255),
       productCode VARCHAR(255),
       nameProduct VARCHAR(255),
       priceProduct FLOAT,
       quantity INT,
       totalMoney FLOAT
);

-- Tạo đối tượng Payment

CREATE TABLE payment
(
       namePayment VARCHAR(255),
       codePayments VARCHAR(255) PRIMARY KEY NOT NULL,
       affiliatedBank VARCHAR(255)
);

-- Tạo bảng đối tượng Transport

CREATE TABLE Transport
(
       nameTransport VARCHAR(255),
       codeTransport VARCHAR(255) PRIMARY KEY NOT NULL,
       affiliatedCompany VARCHAR(255)
);

-- Tạo bảng đối tượng 

CREATE TABLE Product
(
       productCode VARCHAR(255) PRIMARY KEY NOT NULL,
       imgProduct VARCHAR(255),
       nameProduct VARCHAR(255),
       supplierCode VARCHAR(255),
       quantity INT,
       describeProduct VARCHAR(255),
       status VARCHAR(255),
       color VARCHAR(255),
       targetGender VARCHAR(255),
       price FLOAT
);

-- Tạo bảng đối tượng HandbagProduct

CREATE TABLE HandbagProduct
(
       productCode VARCHAR(255),
       bagMaterial VARCHAR(255)
);

-- Tao đối tượng ShirtProduct

CREATE TABLE ShirtProduct
(
       productCode VARCHAR(255),
       shirtMaterial VARCHAR(255),
       sizeCode VARCHAR(255),
       shirtStyle VARCHAR(255)
);

-- Tạo đối tượng ShirtSize

CREATE TABLE ShirtSize
(
       -- thuọc tính kháo ngoại
       sizeCode VARCHAR(255),
       productCode VARCHAR(255)
);

-- Tạo đối tượng Size

CREATE TABLE Size (
    sizeCode VARCHAR(255) PRIMARY KEY NOT NULL,
    sizeName VARCHAR(255)
);

-- Tạo đối tượng EnterBallot

CREATE TABLE EnterBallot (
    codeBallot VARCHAR(255) PRIMARY KEY NOT NULL,
    date DATE,
    userAccount VARCHAR(255),
    sumMoney FLOAT,
    codeSupplier VARCHAR(255),
    state VARCHAR(255),
    note VARCHAR(255)
);

-- Tạo đối tượng BallotDetail

CREATE TABLE BallotDetail (
    codeBallot VARCHAR(255),
    productCode VARCHAR(255),
    quantity INT,
    priceProduct FLOAT,
    sumMoney INT
);

-- Tạo đối tượng Supplier

CREATE TABLE Supplier (
    codeSupplier VARCHAR(255) PRIMARY KEY NOT NULL,
    nameSupplier VARCHAR(255),
    address VARCHAR(255),
    email VARCHAR(255),
    brandSupplier VARCHAR(255),
    phoneNumber VARCHAR(255)
);

-- Tạo các liên kết giữa các bảng với nhau

-- feedback --> account
ALTER TABLE feedback
ADD FOREIGN KEY (userName) REFERENCES accounts(userName);

-- comment --> account
ALTER TABLE comment
ADD FOREIGN KEY (userName) REFERENCES accounts(userName);

-- account --> permission
ALTER TABLE accounts
ADD FOREIGN KEY (codePermissions) REFERENCES permissions(codePermissions);

-- permissionDetail --> permission
ALTER TABLE permissionsdetail
ADD FOREIGN KEY (codePermissions) REFERENCES permissions(codePermissions);

-- permissionsDetail --> function
ALTER TABLE permissionsdetail
ADD FOREIGN KEY (functionCode) REFERENCES functions(functionCode);

-- order --> accounts
ALTER TABLE orders
ADD FOREIGN KEY (userName) REFERENCES accounts(userName);

-- orderdetail --> orders
ALTER TABLE orderdetail
ADD FOREIGN KEY (orderCode) REFERENCES orders(orderCode);

-- orderdetail --> product
ALTER TABLE orderdetail
ADD FOREIGN KEY (productCode) REFERENCES product(productCode);

-- handbagproduct --> product
ALTER TABLE handbagproduct
ADD FOREIGN KEY (productCode) REFERENCES product(productCode);

-- shirtproduct --> product
ALTER TABLE shirtproduct
ADD FOREIGN KEY (productCode) REFERENCES product(productCode);

-- shirtsize --> shirtproduct
ALTER TABLE shirtsize
ADD FOREIGN KEY (productCode) REFERENCES shirtproduct(productCode);


-- shirtsize --> size
ALTER TABLE shirtsize
ADD FOREIGN KEY (sizeCode) REFERENCES size(sizeCode);

-- orders --> payment
ALTER TABLE orders
ADD FOREIGN KEY (codePayments) REFERENCES payment(codePayments);

-- orders --> transport
ALTER TABLE orders
ADD FOREIGN KEY (codeTransport) REFERENCES transport(codeTransport);

-- enterballot --> accounts
ALTER TABLE enterballot
ADD FOREIGN KEY (userName) REFERENCES accounts(userName);

-- ballotdetail --> enterballot
ALTER TABLE ballotdetail
ADD FOREIGN KEY (codeBallot) REFERENCES enterballot(codeBallot);

-- ballotdetail --> product
ALTER TABLE ballotdetail
ADD FOREIGN KEY (productCode) REFERENCES product(productCode);

-- enterballot --> supplier
ALTER TABLE enterballot
ADD FOREIGN KEY (codeSupplier) REFERENCES supplier(codeSupplier);















