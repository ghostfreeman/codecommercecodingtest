# Design Rationale

Much of the enhancements to the existing project aim to leverage existing behavior to avoid introducing challenges that could push past the deliverable timeframe. To assure that maintainability is still feasible, the process took many cues from [data-driven programming](https://en.wikipedia.org/wiki/Data-driven_programming), which is a common pattern used to work past issues of OOP maintainability (extending from poor use of Multiple Inheritance), and to avoid a Interface/Abstract Class populated mess like the kind I maintain on a daily basis.

## Taking from data-driven design
* Model Classes are kept intentionally bare, to represent storage of data
    * If a feature is not going to use it, it shouldn't exist
    * Manipulation of data is not part of the Class, it should only be concerned with CRUD-like operations 
    * In a MVC-style application, these would basically be a representation of a database record (Model), and behave as such 
* Business Logic Classes are where actual logic is conducted in the Application
    * The actual process of doing numerical and accounting operations must be distinctly separate from all other methods so extending functionality does not require major rewrites.
    * Where possible, the logic should be limited in scope and execution (making private, making a static method, etc)

These are represented with two different namespaces, `Models` and `BusinessLogic`

## Modularizing Price Codes
To assist with future development and avoid adding behaviors that could further complicate application behavior, the approach I made to allow for Price Code extension was to set Price Codes in an Enum-like structure, `MovieType`, which trivializes the need to add additional types. Once a new Price Code is added here, additional logic to calcuate rental costs and points accumulation can be made in the classes `Billing` and `FrequentRenterPoints`. This process provides a more ideal, data-oriented process to billing.

# Additional Design Considerations
## Creating classes for Rental Types
This was considered, in which each Movie would have a child-inherited class (`NewRelease`,`Children`,`Scifi`), however there would be challenged with maintaining all these subsequent classes given the nature of single inheritance. Having to maintain up to 20 or 30 classes of the nature would merit additional challenges when having to deal with movies across multiple class types. For the purposes of expedient development and time constraints, this approach was not used.